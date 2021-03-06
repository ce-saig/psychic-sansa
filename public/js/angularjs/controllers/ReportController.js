var app = angular.module('leafBox');

app.controller('ReportController', function($scope,$http,$window, BookProductionService) {
	$scope.books = {};
	$scope.prods = {};
	$scope.medias = {};
	$scope.borrowers = {};
	$scope.columns = {};
	$scope.item = {};
	$scope.report = {};
	$scope.table = {};
	$scope.modal_style = [];
	$scope.showtable = 0;
	$scope.can_create = false;
	$scope.book_table = true;
	$scope.loading = false;
	$scope.hidedownload = true;
	$scope.filter_enabled = [false,false,false,false];
	$scope.is_loading = true

	$scope.AutoSelect = function(index, type){
		if(type=='BOOK'){
			if($scope.books.enabled[index] == true){
				$scope.columns.enabled[index] = true;
				$scope.books.style[index] = {'color': 'white', 'background-color': '#34495e'};
			}else{
				$scope.columns.enabled[index] = false;
				$scope.books.style[index] = {'color': 'grey', 'background-color': '#e6e6e6'};
			}
		}
		if(type='PROD'){
			if($scope.prods.enabled[index] == true){
				$scope.columns.enabled[index+7] = true;
				$scope.prods.style[index] = {'color': 'white', 'background-color': '#34495e'};
				$scope.prods.model[index] = '0';
			}else{
				$scope.columns.enabled[index+7] = false;
				$scope.prods.style[index] = {'color': 'grey', 'background-color': '#e6e6e6'};
				$scope.prods.model[index] = '';
			}
		}
		
		TableEnabled();
	}

	$scope.ChangeColor = function(index, type){
		$scope.havemedia = false;
		if(type == "MEDIA"){
			if($scope.medias.enabled[index] == true){
				$scope.medias.style[index] = {'color': 'white', 'background-color': '#34495e'};
				$scope.medias.model[index] = '0';
			}else{
				$scope.medias.style[index] = {'color': 'grey', 'background-color': '#e6e6e6'};
				$scope.medias.model[index] = '';
			}
		}else{
			if($scope.borrowers.enabled[index] == true){
				$scope.borrowers.style[index] = {'color': 'white', 'background-color': '#34495e'};
			}else{
				$scope.borrowers.style[index] = {'color': 'grey', 'background-color': '#e6e6e6'};
			}
		}
		for(i=0;i<$scope.medias.enabled.length;i++){
			if($scope.medias.enabled[i] == true){
				$scope.havemedia = true;
			}
		}
	}

	$scope.ChangeTable = function(index){
		if($scope.filter_enabled[2] == false)
			$scope.modal_style = [{'color':'#cccccc'},{'color':'#cccccc'},{'color':'#cccccc'}];
		else
			$scope.modal_style = [{'color':'black'},{'color':'black'},{'color':'black'}];
		if(index==0){
			$scope.showtable = index;
			$scope.modal_style[0] = {'color':'#009933'};
		}else if($scope.filter_enabled[2] == true){
			$scope.showtable = index;
			switch($scope.showtable){
				case 1 : 
					$scope.modal_style[0] = {'color':'black'};
					$scope.modal_style[1] = {'color':'#009933'};
					$scope.modal_style[2] = {'color':'black'};
					break;
				case 2 :
					$scope.modal_style[0] = {'color':'black'};
					$scope.modal_style[1] = {'color':'black'};
					$scope.modal_style[2] = {'color':'#009933'};
					break;
			}
		}else{
			$scope.modal_style[0] = {'color':'#009933'};
		}
	}

	var TableEnabled = function(){
		$scope.can_create = false;
		$scope.filter_enabled = [false,false,false,false];
		for(i=0;i<$scope.books.enabled.length;i++){
			if($scope.books.enabled[i] == true)
				$scope.filter_enabled[0] = true;
		}
		for(i=0;i<$scope.prods.enabled.length;i++){
			if($scope.prods.enabled[i] == true)
				$scope.filter_enabled[1] = true;
		}
		for(i=0;i<$scope.medias.enabled.length;i++){
			if($scope.medias.enabled[i] == true)
				$scope.filter_enabled[2] = true;
		}
		for(i=0;i<$scope.borrowers.enabled.length;i++){
			if($scope.borrowers.enabled[i] == true)
				$scope.filter_enabled[3] = true;
		}
		for(i=0;i<$scope.columns.enabled.length;i++){
			if($scope.columns.enabled[i] == true)
				$scope.filter_enabled[4] = true;
		}
	}

	$scope.CreateReport = function(){
		$scope.loading = true;
		var thread_media = false;
		var thread_prod = false;
		$scope.table_download = [true,true,true];
		TableEnabled();
		$http.post("/report/create_report_book",{book : $scope.books, prod : $scope.prods,id_mode : $scope.item.id_mode, book_id_init: $scope.item.book_id_init}).success(function(response){
			$scope.report.prod = response.prods;
			var enabled_count = response.count;
      		response = response.books;
      		if(enabled_count > 1){
	      		var data = [];
	      		var temp = [];
	      		var count = [];
	      		// set count[id] default to 0
	      		for(i=0;i<response.length;i++){
	 						for(j=0;j<response[i].length;j++){
	      				count[response[i][j].id] = 0;
	      			}
	      		}
	      		// count[id]++ when detect same book
	      		for(i=0;i<response.length;i++){
	 						for(j=0;j<response[i].length;j++){
	      				count[response[i][j].id]++;
	      			}
	      		}
	      		// push book that count[id] == enabled_count (all filter have this book)
	      		for(i=0;i<response.length;i++){
	 						for(j=0;j<response[i].length;j++){
	      				if(count[response[i][j].id] == enabled_count){
	      					temp.push(response[i][j]);
	      				}
	      			}
	      		}
	      		// delete same book
	      		data[0] = temp[0];
	      		for(i=1;i<temp.length;i++){
	 						var have = false;
	 						for(j=0;j<data.length;j++){
	      				if(data[j].id == temp[i].id){
	      					have = true;
	      				}
	      			}
	      			if(have == false){
	      				data.push(temp[i]);
	      			}
						}
	      	}else{
	      		data = response[0];
	      	}
					data.forEach(d=> {
						d.pub_year += 543
					}) 
	      	$scope.report.book = data;
      		$http.post("/report/create_report_media",{media : $scope.medias, books : data, borrowers : $scope.borrowers}).success(function(response){
      			console.log(response);
      			$scope.report.media = response;
      			CreateTable();
      			thread_media = true;
      			if(thread_prod == true){
      				$scope.loading = false;
      			}
    		});
      		$http.post("/report/create_report_prod",{books : data}).success(function(response){
      			$scope.report.prod = response;
      			thread_prod = true;
						if(thread_media == true){
      				$scope.loading = false;
      			}
    		});			
			$scope.ChangeTable(0);
	      	console.log($scope.report);
    	});		
	}

	$scope.DetailStatus = function(status){
		label = ['ปกติ', 'ชำรุด', 'รอซ่อม', 'หาย'];
		return label[status]; 
	}

	var CreateTable = function(){
		$scope.table.header = [];
		for(i=0;i<$scope.columns.enabled.length;i++){
			if($scope.columns.enabled[i] == true){
				$scope.table.header.push($scope.columns.label[i]);
			}
		}
	}

	$scope.ExportCSV = function(){
		$scope.hidedownload = true;
		$http.post("/report/export_csv",{'column':$scope.columns, 'book':$scope.report.book,'media':$scope.report.media, 'media_input':$scope.medias,'havemedia': $scope.havemedia, 'media_label':$scope.media_label, 'borrow_label':$scope.borrow_label,'prod_status':$scope.BookProductionService.status, 'table_download':$scope.table_download}).success(function(response){
      		console.log(response);	
      		$scope.hidedownload = false;
    	});
	}

	var SetStyle = function(){
		$scope.books.style = [];
		$scope.prods.style = [];
		$scope.medias.style = [];
		$scope.borrowers.style = [];
		for(i=0;i<$scope.books.enabled.length;i++){
			$scope.books.style[i] = {'color': 'grey','background-color': '#e6e6e6'};
		}
		for(i=0;i<$scope.prods.enabled.length;i++){
			$scope.prods.style[i] = {'color': 'grey','background-color': '#e6e6e6'};
		}
		for(i=0;i<$scope.medias.enabled.length;i++){
			$scope.medias.style[i] = {'color': 'grey','background-color': '#e6e6e6'};
		}
		for(i=0;i<$scope.borrowers.enabled.length;i++){
			$scope.borrowers.style[i] = {'color': 'grey','background-color': '#e6e6e6'};
		}
	}

	var init = function(){
		$scope.BookProductionService = BookProductionService;
		$scope.books.label 		= ["เลขไอดี", "ชื่อหนังสือ", "ผู้แต่ง", "ผู้แปล", "ปีที่พิมพ์", "สำนักพิมพ์", "ประเภทหนังสือ"];
		$scope.books.field 		= ["id", "title", "author", "translate", "pub_year", "publisher", "book_type"];
		$scope.books.model 		= [];
		$scope.books.enabled 	= [false, false, false, false, false, false, false];
		$scope.prods.label 		= ["เบรลล์", "คาสเซ็ท", "เดซี่", "ซีดี", "ดีวีดี"];
		$scope.prods.field 		= ["bm_status", "setcs_status", "setds_status", "setcd_status", "setdvd_status"];
		$scope.prods.model 		= [];
		$scope.prods.enabled 	= [false, false, false, false, false];
		$scope.medias.label 	= ["ปกติ", "ชำรุด", "รอซ่อม", "หาย"];
		$scope.medias.borrower 	= ["ไม่ถูกยืม", "ถูกยืม", "ทั้งหมด"];
		$scope.medias.model 	= [];
		$scope.medias.enabled 	= [false, false, false, false, false];
		$scope.borrowers.label 	= ["ไอดีผู้ยืม", "ชื่อ", "เพศ"];
		$scope.borrowers.gender = ["ชาย", "หญิง"];
		$scope.borrowers.model 	= [];
		$scope.borrowers.enabled = [false, false, false];
		$scope.columns.label 	= ["เลขไอดี", "ชื่อเรื่อง", "ผู้แต่ง", "ผู้แปล", "ปีที่พิมพ์", "สำนักพิมพ์", "ประเภทหนังสือ", "สถานะผลิตเบรลล์", "สถานะผลิตคาสเซ็ท", "สถานะผลิตเดซี่", "สถานะผลิตซีดี", "สถานะผลิตดีวีดี"];
		$scope.columns.field 	= ["id", "title", "author", "translate", "pub_year", "publisher", "book_type", "bm_status", "setcs_status", "setds_status", "setcd_status", "setdvd_status"];
		$scope.columns.enabled 	= [true, true, true, true, true, true, true, false, false, false, false, false];
		$scope.id_modes 		= ["=",">","<","-"];	
		$scope.borrow_label 	= ["ชื่อหนังสือ", "ชนิดสื่อ", "เช็ทไอดีสื่อ", "จำนวนตอนทั้งหมด", "ผู้ยืม", "เมื่อ"];
		$scope.media_label		= ['เช็ทไอดีสื่อ', 'ไอดีสื่อย่อย', 'ตอนที่', 'สถานะ', 'ชื่อหนังสือ', 'ชนิดสื่อ'];
		$scope.medias.haveborrower = 2;
		angular.element(document).ready(function () {
			$scope.is_loading = false;
		});
		SetStyle();
	}

	init();
});