$(document).ready(function() {
	zebraRows('tr:odd td', 'odd');
	
	$('tbody tr').hover(function(){
	  $(this).find('td').addClass('hovered');
	}, function(){
	  $(this).find('td').removeClass('hovered');
	});
	
	//default ng bawat row para makita

	$('tbody tr').addClass('visible');
	
	
	//filter ng search
	$('#search').show();
	
	$('#filter').keyup(function(event) {
		//kapag wala pang nilalagay na isisearch
    if (event.keyCode == 27 || $(this).val() == '') {
			//pag pinindot yung esc ma bubura lahat ng mga nakaraang sinearch
			$(this).val('');
			
			//para makita lang lahat ng products habang wala pang nahahanap sa sinearch
		
      $('tbody tr').removeClass('visible').show().addClass('visible');
    }

		//pag may nailagay na sa search 
		else {
      filter('tbody tr', $(this).val());
    }

		//pang display ulit
		$('.visible td').removeClass('odd');
		zebraRows('.visible:even td', 'odd');
	});
	
	//kukunin lahat ng header rows
	$('thead th').each(function(column) {
		$(this).addClass('sortable')
					.click(function(){
						var findSortKey = function($cell) {
							return $cell.find('.sort-key').text().toUpperCase() + ' ' + $cell.text().toUpperCase();
						};
						
						var sortDirection = $(this).is('.sorted-asc') ? -1 : 1;
						
						//step back up the tree and get the rows with data
						//for sorting
						var $rows		= $(this).parent()
																.parent()
																.parent()
																.find('tbody tr')
																.get();
						
						//loop sa lahat ng rows at hanap 
						$.each($rows, function(index, row) {
							row.sortKey = findSortKey($(row).children('td').eq(column));
						});
						
						//pag ayos ng rows alphabetical
						$rows.sort(function(a, b) {
							if (a.sortKey < b.sortKey) return -sortDirection;
							if (a.sortKey > b.sortKey) return sortDirection;
							return 0;
						});
						
						//add ng rows sa tamang order pababa ng table
						$.each($rows, function(index, row) {
							$('tbody').append(row);
							row.sortKey = null;
						});
						
						//pang identify ng column base sa order
						$('th').removeClass('sorted-asc sorted-desc');
						var $sortHead = $('th').filter(':nth-child(' + (column + 1) + ')');
						sortDirection == 1 ? $sortHead.addClass('sorted-asc') : $sortHead.addClass('sorted-desc');
						
						//pang identify ng column 
						$('td').removeClass('sorted')
									.filter(':nth-child(' + (column + 1) + ')')
									.addClass('sorted');
						
						$('.visible td').removeClass('odd');
						zebraRows('.visible:even td', 'odd');
					});
	});
});


//pag salit salitan ng rows
function zebraRows(selector, className)
{
	$(selector).removeClass(className)
							.addClass(className);
}

//filter ng result base sa query
function filter(selector, query) {
	query	=	$.trim(query); //trim ng white space
  query = query.replace(/ /gi, '|'); //add OR for regex
  
  $(selector).each(function() {
    ($(this).text().search(new RegExp(query, "i")) < 0) ? $(this).hide().removeClass('visible') : $(this).show().addClass('visible');
  });
}