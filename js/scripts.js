$(function(){
	$(document).ready(function(){
		
		

		$("section.creating-file div.task-list-family").sortable({
				// axis: 'y',
				// containment: 'parent',
				cursor: 'pointer',
				connectWith: 'section.creating-file div.task-list'
		});

		$("section.creating-file div.task-list").sortable({
				// containment: 'parent',
				cursor: 'pointer',
				connectWith: 'section.creating-file div.task-list-family'
		});
		
		$("section.creating-file div.task-list-family").sortable({ 
				// containment: 'parent',
				cursor: 'pointer',
				connectWith: 'section.creating-file div.task-list-family'
		});




		$('button.controll-button', this).click(function(){
			id = $(this).attr('id');
			class_item = $(this).attr('class');
			s = class_item.split(' ');
			// console.log(s[3]);
			$(this).toggleClass('hide-but view-but');
			$(this).controll_plugin( id, s[3] );
			// var lt = $('div.task-creater'), ct = $('div.task-list'), rt = $('section.task-division');
			// // if( $(this).attr('class') == 'hide-but' ){
			// 	if( $(this).attr('id') == 1 ){
			// 		left.animate({
			// 			'width' : 0
			// 		},1000);
				// }else if( $(this).attr('id') == 2 ){
				// 	center.animate({
				// 		'width' : 0
				// 	},1000);
				// }else if( $(this).attr('id') == 3 ){
				// 	right.animate({
				// 		'width' : 0
				// 	},1000);
				// }
			// }else{
			// 	if( $(this).attr('id') == 1 ){
			// 		left.animate({
			// 			'width' : 50 + '%'
			// 		},1000);
			// 	}else if( $(this).attr('id') == 2 ){
			// 		center.animate({
			// 			'width' : 50 + '%'
			// 		},1000);
			// 	}else if( $(this).attr('id') == 3 ){
			// 		right.animate({
			// 			'width' : 50 + '%'
			// 		},1000);
			// 	}
			// }
			
		});

		$('.creating-file .task', this).mouseup(function(){
			var current = $(this);
			$(this).trackingTask( current );
		});
		// $('.creating-file .task-list .task', this).mousedown(function(){
		// 	var current = $(this);
		// 	$(this).trackingTask( current );
		// });

		$.fn.trackingTask = function( element ) {
			console.log( element );
			var current = element;
			console.log( current );
			var id = current.attr('id');
			var clss = current.attr('class');
			console.log( id );
			setTimeout(function() {
					// console.log( element[0]['parentElement']['id']);
					// console.log( element[0]['parentElement']['class']);
					// console.log( element[0]['parentElement']['className']);
					buildFile();
			}, 10);
		}

		function buildFile() {
			var arr = ['father', 'mother', 'child'];
			for( var i = 0; i <= arr.length - 1; i++ ){
				// console.log( arr[i] );
				// console.log( '=================================================================' );
				len = $('#' + arr[i] + ' .task').length;
				// console.log( 'count task in id: ' + arr[i] + ' = ' + len );
				for( var j = 0; j <= len; j++ ){
					id = $('#' + arr[i] + ' .task').attr('id');
					desk = $('#' + arr[i] + ' .task .task-description').html();
					// console.log( 'task: ' + id + ' description: ' + desk );
				}
				// console.log( '=================================================================' );
			}
		}

		// $('.crating-tasks .task-list .task', this).mouseout(function(){
		// 	var current = $(this);
		// 	if( current.css('height') == '200px' ){
		// 		current.animate({
		// 			'height' : 10 + 'px'
		// 		},300);
		// 		setTimeout(function() {
		// 			current.stop();
		// 		}, 310);
		// 	}
		// });



		// $('.add-task-item').click(function(){
		// 	var text = $('.text-task').val();
		// 	console.log(text);
		// 	$('.text-task').val('');
			
		// 	tasks( text );
		// });

		var count = 0;
		function tasks( text ) {
			tasks.count++;
			console.log( 'text: ' + text + ' count: ' + count );
			arr = [];
			arr[count] = text;
			console.log( arr );
		}

		// $('.add-item').click(function(){
		// 	var count = $('.task-creator-list tr.task-list-item').length;
		// 	count = count + 1;
		// 	console.log('add ' + count);
		// 	$('.task-list-item').clone().appendTo('.task-creator-list');
		// 	// ('<tr class="task-list-item" id="task_' + count + '"><td><input type="text" class="task-item" id="task_item_1"></td><td><button class="btn btn-danger remove-item"></button></td></tr>');
		// });

		// $('.remove-item', this).click(function(){
		// 	var count = $('.task-creator-list tr.task-list-item').length;
		// 	count = count + 1;
		// 	id = $(this).parent().attr('id');
		// 	console.log('remove ' + count + ' id ' + id);

		// 	// $('tr.info').before('<tr class="task-list-item" id="task_1"><td><input type="text" class="task-item" id="task_item_1"></td><td><button class="btn btn-danger remove-item"></button></td></tr>');
		// });		



		
		

		$.fn.controll_plugin = function( id, s ) {
			var arr = [ 'div.task-creater', 'div.task-list', 'section.task-division' ];
			// class_item = id;
			
			for(var i = 0; i <= 2; i++ ){
				if( id == i ){
					if( s != 'hide-but' ){
						// controll_side( arr[i],  
						$(arr[i]).animate({
							'width' : 50 + '%'
						},1000);
						console.log('hide ' + s);
					}else{
						if( id == 0 ){
							$(arr[i]).animate({
								'width' : 0
							},1000);
							$(arr[i+1]).animate({
								'width' : 100 + '%'
							},1000);
						}else if( id == 1 ){
							$(arr[i]).animate({
								'width' : 0
							},1000);
							$(arr[i-1]).animate({
								'width' : 100 + '%'
							},1000);
						}
						console.log('view ' + s);
					}
				}
			}
			
		}






		$('span.task', this).mousedown(function(){
			var cl = $(this).attr('class');
			$(this).tracking( cl );
			generate_task();
			
		});

		$.fn.tracking = function( cl ){
			var id = $('.' + cl).attr('class');
				// $('#' + id) 
				if( $('#' + id).hasClass( 'ui-sortable-helper' ) ) {
					console.log( 'Return: mouseup > I`m cache true element :) '+ id + ' class: ' + s[0] + ' replace: ' + type + ' classes: ' + t );
					// tracker( id );
					// generate_task();
				}
				// console.log(id );
			// setTimeout(function() {	
				
			// }, 1000);
		}




		function controll_side( id ) {

			
			if( id == 1 ){
				left.css('cssText', 'Width:0px');
			}
		}




		$('span.title-task span.name', this).click(function(){
			var current = $(this);
			var next = current.parent().next();
			if( current.hasClass('open-sp') ){
				next.animate({
					'height' : 100 + '%'
				}, 10);
				current.removeClass('open-sp');
				current.addClass('close-sp');
			}else if(current.hasClass('close-sp')){
				next.animate({
					'height' : 25 + 'px'
				}, 10);
				current.removeClass('close-sp');
				current.addClass('open-sp');
			}
		});



		function generate_task() {
			var tasks = $('.crating-tasks .task-list').html();
			// father.html();
			// mother.html();
			// child.html();
			console.log( '--------------------' );
			arr = [father, mother, child];
			$('.generate-area pre').html(arr);
			console.log( father + ' ' + mother + ' ' + child );

		}

		// $('.generate-area').
		// var arrr = Array;
		// var countarr = 0;
		$('button.add-task-item', this).click(function(){
			// countarr++;
			var c = 0;
			var result;
			var text = $('input.text-task');
			if( text.val() != 0 ){
				c++;
				console.log( '[true] textarea length: ' + text.val().length + ' val: ' + text.val().length );
				// arrr = text.val();
				$('.task-list').append('<span class="task" id="' + c + '"><span class="task-description">' + text.val() + '</span></span>');
				var task = $('.task-list');
				var arr = [];
				for( var i = 0; i <= task[0]['children'].length -1; i++){
					console.log( task[0]['children'][i]['children'][0]['textContent'] );
					arr[i] = task[0]['children'][i]['children'][0]['textContent'];
				}
				console.log( arr );
				var param = { 'query' : 'true', 'object' : 'BuildTask', 'method' : 'createTask', 'array' : { 'type' : 'createTask', 'arr' : arr } };
				$.ajax({
					url: "../application/ini.php",
					type: 'POST',
					data: param,
					dataType: 'json',
					success: function(data) {
						var res = JSON.parse(data);
						console.log( data );
						console.log( 'result: ' + res['tasks'] );
						$('.generate-area pre').text( data );
						result = data;
						// build( res );
					},
					error: function(data) {
						console.log( data );
					}
				});
			}else{
				console.log( '[false] textarea length: ' + text.val().length + ' val: ' + text.val() );
			}
		});

		$('.create-file').click(function(){
			var text = $('.generate-area pre');

			var param = { 'query' : 'true', 'object' : 'BuildTask', 'method' : 'createFile', 'array' : { 'type' : 'createFile', 'data' : text.html() } };
			$.ajax({
				url: "../application/ini.php",
				type: 'POST',
				data: param,
				dataType: 'json',
				success: function(data) {
					// var res = JSON.parse(data);
					console.log( data );
					// console.log( 'result: ' + res['tasks'] );
					// $('.generate-area pre').text( data );
					// result = data;
					// build( res );
				},
				error: function(data) {
					console.log( data );
				}
			});
		});

		$('span.switch-task', this).click(function(){
			if( $(this).hasClass('switch-task-off') ) {
				$(this).removeClass('switch-task-off');
				$(this).addClass('switch-task-on');
				$(this).next().val('done');
				var param = { 'query' : 'true', 'object' : 'BuildTask', 'method' : 'done', 'array' : { 'type' : 'done', 'id_task' : $(this).attr('id') } };
				$.ajax({
					url: "../aws/application/ini.php",
					type: 'POST',
					data: param,
					dataType: 'json',
					success: function(data) {
						var res = JSON.parse(data);
						console.log( data );
						console.log( 'result: ' + res['1'] );
						$('.generate-area pre').html( data );
						// build( res );
					},
					error: function(data) {
						console.log( data );
					}
				});
			}
		});

		$('.load-tasks', this).click(function(){
			var id = $(this).attr('id');
			var param = { 'query' : 'true', 'object' : 'BuildTask', 'method' : 'viewFile', 'array' : { 'type' : 'viewFile', 'data' : $('kbd#' + id).html() } };
			$.ajax({
				url: "../application/ini.php",
				type: 'POST',
				data: param,
				dataType: 'json',
				success: function(data) {
					var res = JSON.parse(data);
					for( var i = 0; i <= res['tasks'].length - 1; i++ ){
						$('.task-list').append('<span class="task ui-sortable-handle" id="' + i + '"><i class="task-description">[' + res['tasks'][i]['task'] + ']</i></span>');
					}
				},
				error: function(data) {
					console.log( 'error' );
				}
			});

		});


		$('.create-task-in-db').click(function(){
			var father = $('div#father').html();
			var mother = $('div#mother').html();
			var child = $('div#child').html();
			var arr = [father, mother, child];
			var param = { 'query' : 'true', 'object' : 'BuildTask', 'method' : 'parse', 'array' : { 'type' : 'parse', 'arr' : arr } };
			$.ajax({
				url: "../aws/application/ini.php",
				type: 'POST',
				data: param,
				dataType: 'json',
				success: function(data) {
					var res = JSON.parse(data);
					console.log( data );
					console.log( 'result: ' + res['1'] );
					$('.task-list').html( data );
					// build( res );
				},
				error: function(data) {
					console.log( data );
				}
			});
		});

	});
	
});	