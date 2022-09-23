// JavaScript Document

function drag(e){
	e.preventDefault();
	$(".drop").css({"backgroundColor":"orange"});
}

function dragleave(e){
	e.preventDefault();
	$(".drop").css({"backgroundColor":"#c8c8c8"});
}

function drop(e){
	e.preventDefault();

	var chk = true;
	var files = e.dataTransfer.files;
	$.each(files, function (i,self){
		if(!(self.type == "image/jpeg" || self.type == "image/png" || self.type == "video/mp4")){
			alert("PNG, JPG, MP4 이 외의 확장자를 갖는 이미지 및 동영상파일은 등록을 제한합니다.");
			chk = false;
			return false;
		}else{
			// $(".drop").css({"background-image":"url('"+  +"')"});
		}
	});

	if(chk) uploadFiles(files);
}

//indexedDB
var db;
var request = window.indexedDB.open("seoul", 1);

request.onsuccess = function(){
	db = request.result;
}

request.onupgradeneeded = function (e){
	var result = e.target.result;
	var objectStore = result.createObjectStore("seoulTable", {keyPath: "idx", autoIncrement: true});
}

function uploadFiles (files){
	$.each(files, function (i,self){
		var data = {};
		data.area = $(".select").val();
		data.type = self.type;
		data.name = self.name;

		var reader = new FileReader();
		reader.onload = function(){
			data.file = this.result;
			saveData(data);
		}

		reader.readAsDataURL(self);
		console.log(data.area + data.name);
	});
}

function saveData(data){
	var tx = db.transaction(["seoulTable"], "readwrite");
	var store = tx.objectStore("seoulTable");
	store.add(data);
}

function findList (name_ko){
	var tx = db.transaction(["seoulTable"], "readwrite");
	var store = tx.objectStore("seoulTable");
	var request = store.openCursor();
		request.onsuccess = function(e){
			var cursor = e.target.result;
			if(cursor){
				var data = cursor.value;
				if(data.area == name_ko);
				addList(data);
			}
		}
}


$(function(){
	
	function on (e, n, f){
		return $(document).on(e, n, f);
	}

	var app = {
		options : {
			arrBox : []
		},
		get : {
			ids : function (){
				var temp = sessionStorage.getItem("login");
				return temp ? true : false;
			}
		}
	}

	on("click", ".left-btn a:nth-child(1)", function (e){
		$(".wrap").load("svg/map.svg");

		$(".left-btn a").hide("fade", 300);
	});

	on("click", ".left-btn a:nth-child(2)", function (e){

	});

	$(".left-btn a").hide("fade", 300);

	
	$(".center-title").html("인사이드서울");

	$(".wrap").load("svg/map.svg");

	$.getJSON("json/description.json", function (data){
		app.options.arrBox = [];
		$.each(data.WardOffice, function (i,self){
			app.options.arrBox.push(self);
		});
	});

	//mouseover
	on("mouseover", "path", function (e){
		$(this).css("fill","#e74c3c");
		var name_en = $(this).attr("id");

		$("text").each(function (i,self){
			if(name_en == $(self).find("tspan").eq(1).text()){
				$(self).find("tspan").css("fill","#fff");
			}
		});
	});

	//mouseleave
	on("mouseleave", "path", function (e){
		$(this).css("fill","#c8c8c8");
		var name_en = $(this).attr("id");

		$("text").each(function (i,self){
			if(name_en == $(self).find("tspan").eq(1).text()){
				$(self).find("tspan").css("fill","#000");
			}
		});
	});

	//secondPage
	on("click", "path", function (e){
		var name_en = $(this).attr("id");

		$.each(app.options.arrBox, function (i,self){
			if(name_en == self.name_en){
				secondPage(self);
				return;
			}
		});
	});

	function secondPage (data){
		$(".wrap").html("");

		$(".left-btn a").show("fade", 300);

		$(".center-title").html(data.name_ko + " " + "정보안내");

		var html = $("<div/>", {class: "god"});
		var bigDiv = $("<div/>", {class: "bigDiv"});
		var bigDiv2 = $("<div/>", {class: "bigDiv2"});
		var firstDiv = $("<div/>", {class: "firstDiv"});
		var secondDiv = $("<div/>", {class: "secondDiv"});

		//firstDiv
		var map = $("<img/>", {src: data.map});
		firstDiv.append(map);

		//secondDiv
		var title = $("<h1/>", {text: data.name_ko});
		var title2 = $("<h2/>", {text: data.name_en});

		var table = $("<table/>", {});
		var tbody = $("<tbody/>", {});

		var firstTr = $("<tr/>", {});
		var firstTrfirstTd = $("<td/>", {text  : "면 적 : "});
		var firstTrsecondTd = $("<td/>", {text  : data.square});

		firstTr.append(firstTrfirstTd).append(firstTrsecondTd);

		var secondTr = $("<tr/>", {});
		var secondTrfirstTd = $("<td/>", {text  : "인 구 : "});
		var secondTrsecondTd = $("<td/>", {text  : data.population});

		secondTr.append(secondTrfirstTd).append(secondTrsecondTd);

		var thirdTr = $("<tr/>", {});
		var thirdTrfirstTd = $("<td/>", {text  : "안내사이트 : "});
		var thirdTrfirstTdA = $("<a/>", {href  : data.url, text: data.url});

		thirdTr.append(thirdTrfirstTd).append(thirdTrfirstTdA);

		table.append(tbody).append(firstTr).append(secondTr).append(thirdTr);

		var description = $("<div/>", {text: data.description});

		secondDiv.append(title).append(title2).append(table).append(description);

		bigDiv.append(firstDiv).append(secondDiv);

		var gallery = $("<img/>", {src: data.file});
		
		bigDiv2.append(gallery);

		html.append(bigDiv).append(bigDiv2);
		$(".wrap").html(html);
	}

	function addList (data){
		var con = $("<div/>", {"data-index": data.idx});
		if(data.type == "image/jpeg" || data.type == "image.png"){
			var img = new Image();
			img.src = data.file;

			con.append(img);
		}else{
			var video = document.createElement("video");
			video.src = data.file;
			video.addEventListener("loadedmetadata", function (){
				currentTime = duration / 2;
			}, false);

			var img = new Image();
			img.src = "images/play_btn.png";
			img.setAttribute("class", "play");

			con.append(video).append(img);
		}

		gallery.append(con);
	}


	//adminPage
	on("click", ".right-btn a", function(e){
		adminPage();
	});

	function adminPage (data){
		$(".wrap").html("");

		$(".left-btn a").show("fade", 300);

		$(".center-title").html("관리자페이지");

		var admin = $("<div/>", {class: "admin"});
			if(!app.get.ids()){
				var loginForm = $("<div/>", {class: "loginForm"});
				var loginId = $("<input/>", {class: "loginId", type: "text", placeholder: "Admin Id"});
				var loginPw = $("<input/>", {class: "loginPw", type: "password", placeholder: "Admin Pw"});
				var loginBtn = $("<button/>", {class: "loginBtn", type: "button", text: "Login"});

				loginForm.append(loginId).append(loginPw).append(loginBtn);
				admin.append(loginForm);
				$(".wrap").html(admin);
			}else{
				var admin = $("<div/>", {class: "admin"});
				var uploadForm = $("<div/>", {class: "uploadForm"});
				var select = $("<select/>", {class: "select"});
				$.each(app.options.arrBox, function (i,self){
					var option = $("<option/>", {value: self.name_ko, text: self.name_ko});
					select.append(option);
				});
				var drop = "<div class='drop' onDragLeave='dragleave(event)' onDragOver='drag(event)' onDrop='drop(event)'>";
				var span = $("<span/>", {text: "drop here"});
				admin.append(select).append(drop);
				$(".wrap").html(admin);
			}

		$(".loginBtn").click(function (e){
            var id = $(".loginId").val();
            var pw = $(".loginPw").val();

            if(id != "admin" || pw != "1234"){
                alert("아이디 혹은 비밀번호가 올바르지 않습니다.");
                return;
            }

            sessionStorage.setItem("login", true);

            adminPage(app.options.arrBox);
        });
	}

});


