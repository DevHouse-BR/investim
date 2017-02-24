<?php
/**
 * Akeeba Engine
 * The modular PHP5 site backup engine
 * @copyright Copyright (c)2009-2010 Nicholas K. Dionysopoulos
 * @license GNU GPL version 3 or, at your option, any later version
 * @package akeebaengine
 * @version $Id: db.php 55 2010-01-30 17:49:24Z nikosdion $
 */

// Protection against direct access
defined('AKEEBAENGINE') or die('Restricted access');

/**
 * Multiple database backup engine.
 */
class AECoreDomainDb extends AEAbstractPart
{
	/** @var array A list of the databases to be packed */
	private $database_list = array();

	/** @var array The current database configuration data */
	private $database_config = null;

	/** @var AEAbstractDump The current dumper engine used to backup tables */
	private $dump_engine = null;

	/** @var string The contents of the databases.ini file */
	private $databases_ini = '';

	/**
	 * Implements the constructor of the class
	 *
	 * @return AECoreDomainDb
	 */
	public function __construct()
	{
		parent::__construct();
		AEUtilLogger::WriteLog(_AE_LOG_DEBUG, __CLASS__." :: New instance");
	}

	/**
	 * Implements the _prepare abstract method
	 *
	 */
	protected function _prepare()
	{
		AEUtilLogger::WriteLog(_AE_LOG_DEBUG, __CLASS__." :: Preparing instance");
		// Populating the list of databases
		$this->populate_database_list();
		if($this->getError())
		{
			return false;
		}
		// caching databases.ini contents
		AEUtilLogger::WriteLog(_AE_LOG_DEBUG, __CLASS__."AkeebaCUBEDomainDBBackup :: Creating databases.ini");
		// Create a new string
		$databasesINI = '';

		// Loop through databases list
		foreach( $this->database_list as $rootname => $definition )
		{
			$section = basename($definition['dumpFile']);

			$this->databases_ini .= <<<ENDDEF
[$section]
dbname = "{$definition['database']}"
sqlfile = "{$definition['dumpFile']}"
dbhost = "{$definition['host']}"
dbuser = "{$definition['username']}"
dbpass = "{$definition['password']}"
prefix = "{$definition['prefix']}"

ENDDEF;
		}


		$this->setState('prepared');
	}

	/**
	 * Implements the _run() abstract method
	 */
	protected function _run()
	{
		if( $this->getState() == 'postrun' )
		{
			AEUtilLogger::WriteLog(_AE_LOG_DEBUG, __CLASS__." :: Already finished");
			$this->setStep('');
			$this->setSubstep('');
		} else {
			$this->setState('running');
		}

		// Make sure we have a dumper instance loaded!
		if(is_null( $this->dump_engine ))
		{
			AEUtilLogger::WriteLog(_AE_LOG_DEBUG, __CLASS__." :: Iterating next database");
			// Create a new instance
			$this->dump_engine =& AEFactory::getDumpEngine();

			// Configure the dumper instance and pass on the volatile database root registry key
			$registry =& AEFactory::getConfiguration();
			$rootkeys = array_keys($this->database_list);
			$root = array_shift($rootkeys);
			$registry->set('volatile.database.root', $root);
			$this->database_config = array_shift($this->database_list);
			$this->database_config['root'] = $root;
			$this->dump_engine->setup( $this->database_config );

			// Error propagation
			$this->propagateFromObject($this->dump_engine);
			if($this->getError())
			{
				return false;
			}
		}

		// Try to step the instance
		$retArray = $this->dump_engine->tick();

		// Error propagation
		$this->propagateFromObject($this->dump_engine);
		if($this->getError())
		{
			return false;
		}

		$this->setStep($retArray['Step']);
		$this->setSubstep($retArray['Substep']);

		// Check if the instance has finished
		if(!$retArray['HasRun'])
		{
			// The instance has finished; go to the next entry in the list and dispose the old AkeebaDumperDefault instance
			$this->dump_engine = null;

			// Are we past the end of the list?
			if( empty($this->database_list) )
			{
				AEUtilLogger::WriteLog(_AE_LOG_DEBUG, __CLASS__." :: No more databases left to iterate");
				$this->setState('postrun');
			}
		}
	}

	/**
	 * Implements the _finalize() abstract method
	 *
	 */
	protected function _finalize()
	{
		$this->setState('finished');

		// If we are in db backup mode, don't create a databases.ini
		$configuration =& AEFactory::getConfiguration();

		if (!AEUtilScripting::getScriptingParameter('db.databasesini',1)) {
			AEUtilLogger::WriteLog(_AE_LOG_DEBUG, __CLASS__." :: Skipping databases.ini");
			return;
		}

		AEUtilLogger::WriteLog(_AE_LOG_DEBUG, __CLASS__."AkeebaCUBEDomainDBBackup :: Creating databases.ini");
		// Create a new string
		$databasesINI = $this->databases_ini;

		// BEGIN FIX 1.2 Stable -- databases.ini isn't written on disk
		AEUtilLogger::WriteLog(_AE_LOG_DEBUG, __CLASS__." :: Writing databases.ini contents");
		$archiver =& AEFactory::getArchiverEngine();
		$virtualLocation = ( AEUtilScripting::getScriptingParameter('db.saveasname','normal') == 'short' ) ? '' : 'installation/sql';
		$archiver->addVirtualFile('databases.ini',$virtualLocation,$databasesINI);

		// Error propagation
		$this->propagateFromObject($archiver);
		if($this->getError())
		{
			return false;
		}

		// On alldb mode, we have to finalize the archive as well
		if( AEUtilScripting::getScriptingParameter('db.finalizearchive',0) )
		{
			AEUtilLogger::WriteLog(_AE_LOG_INFO, "Finalizing database dump archive");
			$archiver->finalize();
		}

		// Error propagation
		$this->propagateFromObject($archiver);
		if($this->getError())
		{
			return false;
		}

	}

	/**
	 * Populates database_list with the list of databases in the settings
	 *
	 */
	private function populate_database_list()
	{
		// Get database inclusion filters
		$filters =& AEFactory::getFilters();
		$this->database_list = $filters->getInclusions('db');
		// Error propagation
		$this->propagateFromObject($filters);
		if($this->getError())
		{
			return false;
		}

		if (AEUtilScripting::getScriptingParameter('skipextradb',0)) {
			// On database only backups we prune extra databases
			AEUtilLogger::WriteLog(_AE_LOG_DEBUG, __CLASS_." :: Adding only main database");
			if( count($this->database_list) > 1 )
			{
				$this->database_list = array_slice($this->database_list,0,1);
			}
		}
	}
}