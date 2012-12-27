<?php

	class Loader extends WebLab_Loader_Application
	{
		
		protected function environment() { // namen van deze methodes moeten niet meer geprefixed worden met _init
			session_start();
			
			WebLab_Template::setRootTemplate( new WebLab_Template( 'main/index.php' ) );
		}
		
		protected function controlDispatcher() { // Deze worden aangegeven in uw config, zie Application -> Modules -> Loader -> loads
			$dispatcher = new WebLab_Dispatcher_Visit(); // Hier moet je door de Application -> Dispatcher -> Visit tree in de config
			// Geen parameters meer meegeven.
			$dispatcher->execute();
		}
		
		protected function shutdown() { // Alles in de loader wordt geladen in de volgorde als dat het in de config staat.
		// Shutdown staat als laatste en heeft als doel de templates naar de browser te sturen als HTML.
			echo WebLab_Template::getRootTemplate(); // WebLab_Template::getRootTemplate haalt het template dat zich in de root bevind van
			// de template boomstructuur.
		}
		
	}