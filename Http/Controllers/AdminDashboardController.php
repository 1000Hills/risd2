<?php namespace App\Http\Controllers;

	use Session;
	use Request;
	use DB;
	use CRUDBooster;

	class AdminDashboardController extends \crocodicstudio\crudbooster\controllers\CBController {

	    public function cbInit() {

			# START CONFIGURATION DO NOT REMOVE THIS LINE
			$this->title_field = "id";
			$this->limit = "20";
			$this->orderby = "id,desc";
			$this->global_privilege = false;
			$this->button_table_action = true;
			$this->button_bulk_action = true;
			$this->button_action_style = "button_icon";
			$this->button_add = true;
			$this->button_edit = true;
			$this->button_delete = true;
			$this->button_detail = true;
			$this->button_show = true;
			$this->button_filter = true;
			$this->button_import = false;
			$this->button_export = false;
			$this->table = "abunzi";
			# END CONFIGURATION DO NOT REMOVE THIS LINE

			# START COLUMNS DO NOT REMOVE THIS LINE
			$this->col = [];
			$this->col[] = ["label"=>"Msisdn","name"=>"msisdn"];
			$this->col[] = ["label"=>"Requestdate","name"=>"requestdate"];
			$this->col[] = ["label"=>"Registered Code","name"=>"registered_code"];
			$this->col[] = ["label"=>"Committee Type","name"=>"committee_type"];
			$this->col[] = ["label"=>"Province","name"=>"province"];
			$this->col[] = ["label"=>"District","name"=>"district"];
			$this->col[] = ["label"=>"Sector","name"=>"sector"];
			# END COLUMNS DO NOT REMOVE THIS LINE

			# START FORM DO NOT REMOVE THIS LINE
			$this->form = [];
			$this->form[] = ['label'=>'Msisdn','name'=>'msisdn','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Requestdate','name'=>'requestdate','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Registered Code','name'=>'registered_code','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Committee Type','name'=>'committee_type','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Province','name'=>'province','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'District','name'=>'district','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Sector','name'=>'sector','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Total Number Of Received Issues','name'=>'total_number_of_received_issues','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Cell','name'=>'cell','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Number Of Received Issues From Male','name'=>'number_of_received_issues_from_male','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Number Of Received Issues From Female','name'=>'number_of_received_issues_from_female','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Solved Issues In The Current Month','name'=>'solved_issues_in_the_current_month','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Unsolved Issues In The Current Month','name'=>'unsolved_issues_in_the_current_month','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Number Of Issues Related To Land','name'=>'number_of_issues_related_to_land','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Number Of Issues Related To Heritage','name'=>'number_of_issues_related_to_heritage','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Number Of Issues Related To Border','name'=>'number_of_issues_related_to_border','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Number Of Issues Related To Land Gift','name'=>'number_of_issues_related_to_land_gift','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Number Of Issues Related To Other Gift','name'=>'number_of_issues_related_to_other_gift','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Number Of Family Related Land Issues','name'=>'number_of_family_related_land_issues','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Number Of Other Family Related Issues','name'=>'number_of_other_family_related_issues','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Number Of Issues Related To Renting','name'=>'number_of_issues_related_to_renting','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Number Of Land Disputes Related To Land Renting','name'=>'number_of_land_disputes_related_to_land_renting','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Number Of Land Disputes Related To Breach Of Contact','name'=>'number_of_land_disputes_related_to_breach_of_contact','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Number Of Other Disputes Related To Breach Of Contract','name'=>'number_of_other_disputes_related_to_breach_of_contract','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Other Disputes Not Specified','name'=>'other_disputes_not_specified','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Number Of Abunzi Who Were Suspended Due To Non Performance','name'=>'number_of_abunzi_who_were_suspended_due_to_non_performance','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Number Of Abunzi Fired Due To Their Misbehavior','name'=>'number_of_abunzi_fired_due_to_their_misbehavior','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Number Of Abunzi Resigned Or Not Present Due To Other Reasons','name'=>'number_of_abunzi_resigned_or_not_present_due_to_other_reasons','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Number Of Cases Mediated With Consensus Of Disputant','name'=>'number_of_cases_mediated_with_consensus_of_disputant','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Number Of Cases Mediated With Partial Consensus','name'=>'number_of_cases_mediated_with_partial_consensus','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Number Of Cases Mediated Without Consensus Among Disputants','name'=>'number_of_cases_mediated_without_consensus_among_disputants','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Conclusion','name'=>'conclusion','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			# END FORM DO NOT REMOVE THIS LINE

			# OLD START FORM
			//$this->form = [];
			//$this->form[] = ["label"=>"Msisdn","name"=>"msisdn","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Requestdate","name"=>"requestdate","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Registered Code","name"=>"registered_code","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Committee Type","name"=>"committee_type","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Province","name"=>"province","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"District","name"=>"district","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Sector","name"=>"sector","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Total Number Of Received Issues","name"=>"total_number_of_received_issues","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Cell","name"=>"cell","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Number Of Received Issues From Male","name"=>"number_of_received_issues_from_male","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Number Of Received Issues From Female","name"=>"number_of_received_issues_from_female","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Solved Issues In The Current Month","name"=>"solved_issues_in_the_current_month","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Unsolved Issues In The Current Month","name"=>"unsolved_issues_in_the_current_month","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Number Of Issues Related To Land","name"=>"number_of_issues_related_to_land","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Number Of Issues Related To Heritage","name"=>"number_of_issues_related_to_heritage","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Number Of Issues Related To Border","name"=>"number_of_issues_related_to_border","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Number Of Issues Related To Land Gift","name"=>"number_of_issues_related_to_land_gift","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Number Of Issues Related To Other Gift","name"=>"number_of_issues_related_to_other_gift","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Number Of Family Related Land Issues","name"=>"number_of_family_related_land_issues","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Number Of Other Family Related Issues","name"=>"number_of_other_family_related_issues","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Number Of Issues Related To Renting","name"=>"number_of_issues_related_to_renting","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Number Of Land Disputes Related To Land Renting","name"=>"number_of_land_disputes_related_to_land_renting","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Number Of Land Disputes Related To Breach Of Contact","name"=>"number_of_land_disputes_related_to_breach_of_contact","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Number Of Other Disputes Related To Breach Of Contract","name"=>"number_of_other_disputes_related_to_breach_of_contract","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Other Disputes Not Specified","name"=>"other_disputes_not_specified","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Number Of Abunzi Who Were Suspended Due To Non Performance","name"=>"number_of_abunzi_who_were_suspended_due_to_non_performance","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Number Of Abunzi Fired Due To Their Misbehavior","name"=>"number_of_abunzi_fired_due_to_their_misbehavior","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Number Of Abunzi Resigned Or Not Present Due To Other Reasons","name"=>"number_of_abunzi_resigned_or_not_present_due_to_other_reasons","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Number Of Cases Mediated With Consensus Of Disputant","name"=>"number_of_cases_mediated_with_consensus_of_disputant","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Number Of Cases Mediated With Partial Consensus","name"=>"number_of_cases_mediated_with_partial_consensus","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Number Of Cases Mediated Without Consensus Among Disputants","name"=>"number_of_cases_mediated_without_consensus_among_disputants","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Conclusion","name"=>"conclusion","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			# OLD END FORM

			/* 
	        | ---------------------------------------------------------------------- 
	        | Sub Module
	        | ----------------------------------------------------------------------     
			| @label          = Label of action 
			| @path           = Path of sub module
			| @foreign_key 	  = foreign key of sub table/module
			| @button_color   = Bootstrap Class (primary,success,warning,danger)
			| @button_icon    = Font Awesome Class  
			| @parent_columns = Sparate with comma, e.g : name,created_at
	        | 
	        */
	        $this->sub_module = array();


	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add More Action Button / Menu
	        | ----------------------------------------------------------------------     
	        | @label       = Label of action 
	        | @url         = Target URL, you can use field alias. e.g : [id], [name], [title], etc
	        | @icon        = Font awesome class icon. e.g : fa fa-bars
	        | @color 	   = Default is primary. (primary, warning, succecss, info)     
	        | @showIf 	   = If condition when action show. Use field alias. e.g : [id] == 1
	        | 
	        */
	        $this->addaction = array();


	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add More Button Selected
	        | ----------------------------------------------------------------------     
	        | @label       = Label of action 
	        | @icon 	   = Icon from fontawesome
	        | @name 	   = Name of button 
	        | Then about the action, you should code at actionButtonSelected method 
	        | 
	        */
	        $this->button_selected = array();

	                
	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add alert message to this module at overheader
	        | ----------------------------------------------------------------------     
	        | @message = Text of message 
	        | @type    = warning,success,danger,info        
	        | 
	        */
	        $this->alert        = array();
	                

	        
	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add more button to header button 
	        | ----------------------------------------------------------------------     
	        | @label = Name of button 
	        | @url   = URL Target
	        | @icon  = Icon from Awesome.
	        | 
	        */
	        $this->index_button = array();



	        /* 
	        | ---------------------------------------------------------------------- 
	        | Customize Table Row Color
	        | ----------------------------------------------------------------------     
	        | @condition = If condition. You may use field alias. E.g : [id] == 1
	        | @color = Default is none. You can use bootstrap success,info,warning,danger,primary.        
	        | 
	        */
	        $this->table_row_color = array();     	          

	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | You may use this bellow array to add statistic at dashboard 
	        | ---------------------------------------------------------------------- 
	        | @label, @count, @icon, @color 
	        |
	        */
	        $this->index_statistic = array();



	        /*
	        | ---------------------------------------------------------------------- 
	        | Add javascript at body 
	        | ---------------------------------------------------------------------- 
	        | javascript code in the variable 
	        | $this->script_js = "function() { ... }";
	        |
	        */
	        $this->script_js = NULL;


            /*
	        | ---------------------------------------------------------------------- 
	        | Include HTML Code before index table 
	        | ---------------------------------------------------------------------- 
	        | html code to display it before index table
	        | $this->pre_index_html = "<p>test</p>";
	        |
	        */
	        $this->pre_index_html = null;
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Include HTML Code after index table 
	        | ---------------------------------------------------------------------- 
	        | html code to display it after index table
	        | $this->post_index_html = "<p>test</p>";
	        |
	        */
	        $this->post_index_html = null;
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Include Javascript File 
	        | ---------------------------------------------------------------------- 
	        | URL of your javascript each array 
	        | $this->load_js[] = asset("myfile.js");
	        |
	        */
	        $this->load_js = array();
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Add css style at body 
	        | ---------------------------------------------------------------------- 
	        | css code in the variable 
	        | $this->style_css = ".style{....}";
	        |
	        */
	        $this->style_css = NULL;
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Include css File 
	        | ---------------------------------------------------------------------- 
	        | URL of your css each array 
	        | $this->load_css[] = asset("myfile.css");
	        |
	        */
	        $this->load_css = array();
	        
	        
	    }

	    /**
	     * Dashboard controller
	     * @return [type] [description]
	     */
        public function getIndex() {
        	// Only allow logged in users
        	if(empty(CRUDBooster::myId())){
        		return redirect()->to('admin/login');
        	}

        	$privilege = strtolower(CRUDBooster::myPrivilegeName());

        	$data      = [];

        	// If police then show plice data
        	if (strpos($privilege,'police') !== FALSE  || strpos($privilege,'super administrator') !== FALSE) {
             	$data['police_charts'] = view('community_policing_charts')->render();
        	}

        	// Focal person
        	if (strpos($privilege, 'focal') !== FALSE || strpos($privilege,'super administrator') !== FALSE ) {
	         	$data['focal_person_charts'] = view('community_focal_person_charts')->render();
        	}

        	// Focal person
        	if (strpos($privilege, 'abunzi') !== FALSE || strpos($privilege,'super administrator') !== FALSE) {
	         	$data['abunzi_charts'] = view('abunzi_charts')->render();
        	}

        	// Focal person
        	if (strpos($privilege, 'abunziland') !== FALSE || strpos($privilege,'super administrator') !== FALSE) {
	         	$data['abunzi_land_charts'] = view('abunzi_land_charts')->render();
        	}

         	return $this->cbView('dashboard_charts',$data);
		} 
     	
     ///////////////////
     // POLICE CHARTS //
     ///////////////////
      /**
       * Filter police based on who logged in 
       * @param   $query 
       * @return  
       */
      private function filterPolice($query){
      	     
      	    // nanatize, remove any space and make it lower 
      	    $privilege = str_replace(' ', '', CRUDBooster::myPrivilegeName());
      	    $privilege = strtolower($privilege);

	        //Your code here
	        switch ($privilege) {
	        	case 'policedistrict':
	        		$query->where('district',CRUDBooster::me()->district);
	        		break;
	        	case 'policeland':
	        		$query->where('type_of_issue','ubutaka');
	        		break;    
	        }

	        return $query;
      }
		 /**
	     * Display a the chart for projects.
	     * GET /dashboard/policing/typeofissues
	     *
	     * @return Response
	     */
	     
	    public function policetypeOfIssueChartData()
	    {
	        $query = DB::table('community_policing')
	                ->select( 
	                		 DB::raw("type_of_issue as label"),
	                	     DB::raw("concat('#',SUBSTRING((lpad(hex(round(rand() * 10000000)),6,0)),-6)) as color"),
	                		 DB::raw('count(1) as value')
	                		);
	                
	         return $this->filterPolice($query)->groupBy(['type_of_issue'])
	                ->get();
	    }
		 /**
	     * Display a the chart for projects.
	     * GET /dashboard/policing/typeofissues
	     *
	     * @return Response
	     */
	     
	    public function policegenderOfVictimChartData()
	    {
	        $query = DB::table('community_policing')
	                ->select(
			                 DB::raw("REPLACE(LEFT(requestdate,7),'-','') as month"),
	                		 DB::raw("gender_of_victim as label"),
	                	     DB::raw("concat('#',SUBSTRING((lpad(hex(round(rand() * 10000000)),6,0)),-6)) as color"),
	                		 DB::raw('count(1) as value')
	                		);
	                
	         return $this->filterPolice($query)->groupBy(['gender_of_victim',DB::raw("REPLACE(LEFT(requestdate,7),'-','')")])
	                ->get();
	    }

		 /**
	     * Display a the chart for projects.
	     * GET /dashboard/policing/typeofissues
	     *
	     * @return Response
	     */
	     
	    public function policesectorOfIssueChartData()
	    {
	        $query = DB::table('community_policing')
	                ->select(DB::raw("REPLACE(LEFT(requestdate,7),'-','') as month"),
	                		 DB::raw("province as label"),
	                	     DB::raw("concat('#',SUBSTRING((lpad(hex(round(rand() * 10000000)),6,0)),-6)) as color"),
	                		 DB::raw('count(distinct sector) as value')
	                		);
	                
	         return $this->filterPolice($query)->groupBy(['province',DB::raw("REPLACE(LEFT(requestdate,7),'-','')")])
	                ->get();
	    }

		 /**
	     * Display a the chart for projects.
	     * GET /dashboard/policing/typeofissues
	     *
	     * @return Response
	     */
	     
	    public function policelandTypeIssueChartData()
	    {
	        $query = DB::table('community_policing')
	                ->select(DB::raw("REPLACE(LEFT(requestdate,7),'-','') as month"),
	                		 DB::raw('count(distinct sector) as value')
	                		);
	         return $this->filterPolice($query)->groupBy([DB::raw("REPLACE(LEFT(requestdate,7),'-','')")])
	                ->get();
	    }

	    //////////////////////////////////
	    // --- END OF POLICE CHART ---- //
	    //////////////////////////////////

	    ////////////////////////////////
	    // ==== START OF FOCAL PERSON //
	    ////////////////////////////////
	    
	     
	    public function focalgenderOfComplainantsChartData()
	    {
	        return  DB::table('community_focal_person')
	                ->select(
			                 DB::raw("REPLACE(LEFT(requestdate,7),'-','') as month"),
	                		 DB::raw("gender as label"),
	                	     DB::raw("concat('#',SUBSTRING((lpad(hex(round(rand() * 10000000)),6,0)),-6)) as color"),
	                		 DB::raw('count(1) as value')
	                		)
	                ->groupBy(['gender',DB::raw("REPLACE(LEFT(requestdate,7),'-','')")])
	                ->get();
	    }

	    /**
	     * Status of the issue
	     * @return  json
	     */
	    public function statusOfTheIssueChartData()
	    {
	        return DB::table('community_focal_person')
	                ->select( 
	                		 DB::raw("status_of_the_issue as label"),
	                	     DB::raw("concat('#',SUBSTRING((lpad(hex(round(rand() * 10000000)),6,0)),-6)) as color"),
	                		 DB::raw('count(1) as value')
	                		)
	                ->groupBy(['status_of_the_issue'])
	                ->get();
	    }

	    /**
	     * Land has all required documents
	     * @return  
	     */
	    public function landHasAllRequiredDocumentChartData()
	    {
	    	
	        $query = DB::table('community_focal_person')
	                ->select(DB::raw("REPLACE(LEFT(requestdate,7),'-','') as month"),
	                		 DB::raw("land_has_required_documents as label"),
	                	     DB::raw("concat('#',SUBSTRING((lpad(hex(round(rand() * 10000000)),6,0)),-6)) as color"),
	                		 DB::raw('count(1) as value')
	                		);
	                
	         return $this->filterPolice($query)->groupBy(['land_has_required_documents',DB::raw("REPLACE(LEFT(requestdate,7),'-','')")])
	                ->get();
	    }

	    /**
	     * Land related issues
	     * @return  
	     */
	    public function landRelatedIssueChartData()
	    {
	        return  DB::table('community_focal_person')
	                ->select(DB::raw("REPLACE(LEFT(requestdate,7),'-','') as month"),
	                		 DB::raw('count(1) as value')
	                		)
	                ->where('is_it_a_land_related_issue','yes')
	                ->groupBy([DB::raw("REPLACE(LEFT(requestdate,7),'-','')")])
	                ->get();
	    }

	    /////////////////////////////
	    // -- END OF FOCAL PERSON  //
	    /////////////////////////////


	    ////////////////////////////
	    // -- START OF THE ABUNZI //
	    ////////////////////////////
	    
	    /**
	     * Filter for abunzi
	     * @param string $value 
	     */
	    public function filterAbunzi($query)
	    {
      	    // sanatize, remove any space and make it lower 
      	    $privilege = str_replace(' ', '', CRUDBooster::myPrivilegeName());
      	    $privilege = strtolower($privilege);
      	    
	        //Your code here
	        switch ($privilege) {
	        	case 'abunzidistrict':
	        		$query->where('district',CRUDBooster::me()->district);
	        	break;
	        }

	        return  $query;

	    }

	    /**
	     * Get committee types
	     * @return json
	     */
	    public function committeetypesChartData()
	    {
	        $query = DB::table('abunzi')
	                ->select(
			                 DB::raw("REPLACE(LEFT(requestdate,7),'-','') as month"),
	                		 DB::raw("committee_type as label"),
	                	     DB::raw("concat('#',SUBSTRING((lpad(hex(round(rand() * 10000000)),6,0)),-6)) as color"),
	                		 DB::raw('count(1) as value')
	                		);
	                
	         return $this->filterAbunzi($query)->groupBy(['committee_type',DB::raw("REPLACE(LEFT(requestdate,7),'-','')")])
	                ->get();
	    }

	    /**
	     * 
	     * @return  json
	     */
	    public function disputePerDistrictChartData()
	    {
	        $query = DB::table('abunzi')
	                ->select( 
	                		 DB::raw("district as label"),
	                	     DB::raw("concat('#',SUBSTRING((lpad(hex(round(rand() * 10000000)),6,0)),-6)) as color"),
	                		 DB::raw("SUM(total_number_of_received_issues) as value")
	                		);
	                
	         return $this->filterAbunzi($query)->groupBy(['district'])
	                ->get();
	    }

	    /**
	     * Get information for male vs female
	     * @return  json
	     */
	    public function maleVsFemaleCasesChartData()
	    {
	        $query = DB::table('abunzi')
	                ->select( 
	                		 DB::raw("REPLACE(LEFT(requestdate,7),'-','') As month"),
	                		 DB::raw("SUM(number_of_received_issues_from_male) AS male"),
	                		 DB::raw(" SUM(number_of_received_issues_from_female) AS female")
	                		);
	         return $this->filterAbunzi($query)->groupBy([DB::raw("REPLACE(LEFT(requestdate,7),'-','')")])
	                ->get();
	    }

	    	    /**
	     * Get information for male vs female
	     * @return  json
	     */
	    public function receivedIssuePerMonthChartData()
	    {
	        $query = DB::table('abunzi')
	                ->select( 
	                		 DB::raw("REPLACE(LEFT(requestdate,7),'-','') As month"),
	                		 DB::raw("SUM(total_number_of_received_issues) AS received_issues")
	                		);
	         return $this->filterAbunzi($query)->groupBy([DB::raw("REPLACE(LEFT(requestdate,7),'-','')")])
	                ->get();
	    }

	    /**
	     * Get information for male vs female
	     * @return  json
	     */
	    public function landTypesofIssuesChartData()
	    {
	        $query = DB::table('abunzi')
	                ->select( 
	                		 DB::raw("district As district"),
	                		 DB::raw("SUM(number_of_issues_related_to_land) AS inheritance"),
	                		 DB::raw("SUM(number_of_issues_related_to_border) AS boundaries"),
	                		 DB::raw("SUM(number_of_issues_related_to_land_gift) AS donation"),
	                		 DB::raw("SUM(number_of_family_related_land_issues) AS family"),
	                		 DB::raw("SUM(number_of_land_disputes_related_to_land_renting) AS rent"),
	                		 DB::raw("SUM(number_of_land_disputes_related_to_breach_of_contact) AS contract")
	                		);

	         return $this->filterAbunzi($query)->groupBy(['district'])
	     ->get();
	    }

/**
	     * Get information for male vs female
	     * @return  json
	     */
	    public function notLandTypesofIssuesChartData()
	    {
	        $query = DB::table('abunzi')
	                ->select( 
	                		 DB::raw("district As district"),
	                		 DB::raw("SUM(number_of_issues_related_to_heritage) AS inheritance"),
	                		 DB::raw("SUM(number_of_issues_related_to_other_gift) AS donation"),
	                		 DB::raw("SUM(number_of_other_family_related_issues) AS family"),
	                		 DB::raw("SUM(number_of_issues_related_to_renting) AS rent"),
	                		 DB::raw("SUM(number_of_other_disputes_related_to_breach_of_contract) AS contract")
	                		);

	         return $this->filterAbunzi($query)->groupBy(['district'])
	     ->get();
	    }


	     /**
	     * 
	     * @return  json
	     */
	                 
	                 public function mediationPerformanceChartData()
	    {
	        $query = DB::table('abunzi')
	                ->select( 
	                		 DB::raw("committee_type As district"),
	                		 DB::raw("SUM(number_of_cases_mediated_with_consensus_of_disputant) as consensus"),
	                		 DB::raw("SUM(number_of_cases_mediated_with_partial_consensus) as partial"),
	                		 DB::raw("SUM(number_of_cases_mediated_without_consensus_among_disputants) as no_consensus")
	                		);

	         return $this->filterAbunzi($query)->groupBy(['committee_type'])
	     ->get();
	    }
	    



	    /////////////////////////////
	    // -- END OF ABUNZI CHARTS //
	    /////////////////////////////

	   /*
	    | ---------------------------------------------------------------------- 
	    | Hook for button selected
	    | ---------------------------------------------------------------------- 
	    | @id_selected = the id selected
	    | @button_name = the name of button
	    |
	    */
	    public function actionButtonSelected($id_selected,$button_name) {
	        //Your code here
	            
	    }


	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate query of index result 
	    | ---------------------------------------------------------------------- 
	    | @query = current sql query 
	    |
	    */
	    public function hook_query_index(&$query) {
	        //Your code here
	            
	    }

	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate row of index table html 
	    | ---------------------------------------------------------------------- 
	    |
	    */    
	    public function hook_row_index($column_index,&$column_value) {	        
	    	//Your code here
	    }

	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate data input before add data is execute
	    | ---------------------------------------------------------------------- 
	    | @arr
	    |
	    */
	    public function hook_before_add(&$postdata) {        
	        //Your code here

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command after add public static function called 
	    | ---------------------------------------------------------------------- 
	    | @id = last insert id
	    | 
	    */
	    public function hook_after_add($id) {        
	        //Your code here

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate data input before update data is execute
	    | ---------------------------------------------------------------------- 
	    | @postdata = input post data 
	    | @id       = current id 
	    | 
	    */
	    public function hook_before_edit(&$postdata,$id) {        
	        //Your code here

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command after edit public static function called
	    | ----------------------------------------------------------------------     
	    | @id       = current id 
	    | 
	    */
	    public function hook_after_edit($id) {
	        //Your code here 

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command before delete public static function called
	    | ----------------------------------------------------------------------     
	    | @id       = current id 
	    | 
	    */
	    public function hook_before_delete($id) {
	        //Your code here

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command after delete public static function called
	    | ----------------------------------------------------------------------     
	    | @id       = current id 
	    | 
	    */
	    public function hook_after_delete($id) {
	        //Your code here

	    }



	    //By the way, you can still create your own method in here... :) 


	}