function initSorting() {
    $(document).ready(function() {
        var lastClickedHeader = null;
      
        $('.sortable').click(function() {
          var $table = $(this).closest('table');
          var columnIndex = $(this).index();
          var rows = $table.find('tbody > tr').get();
          var sortOrder = $(this).data('sort-order') || 'asc';
      
          if (lastClickedHeader !== this) {
            sortOrder = 'asc';
          } else {
            sortOrder = (sortOrder === 'asc') ? 'desc' : 'asc';
          }
      
          rows.sort(function(a, b) {
            var cellValueA = $(a).find('td').eq(columnIndex).text().toUpperCase();
            var cellValueB = $(b).find('td').eq(columnIndex).text().toUpperCase();
      
            var isNumericA = !isNaN(parseFloat(cellValueA)) && isFinite(cellValueA);
            var isNumericB = !isNaN(parseFloat(cellValueB)) && isFinite(cellValueB);
      
            if (isNumericA && isNumericB) {
              cellValueA = parseFloat(cellValueA);
              cellValueB = parseFloat(cellValueB);
            }
      
            if (sortOrder === 'asc') {
              if (isNumericA && isNumericB) {
                return cellValueA - cellValueB;
              } else {
                return cellValueA.localeCompare(cellValueB);
              }
            } else if (sortOrder === 'desc') {
              if (isNumericA && isNumericB) {
                return cellValueB - cellValueA;
              } else {
                return cellValueB.localeCompare(cellValueA);
              }
            } else {
              return 0;
            }
          });
      
          $table.find('tbody').empty().append(rows);
      
          $(this).data('sort-order', sortOrder);
      
          if (sortOrder === 'asc') {
            $(this).find('.sort-arrow').removeClass('fa-sort-down').addClass('fa-sort-up');
          } else if (sortOrder === 'desc') {
            $(this).find('.sort-arrow').removeClass('fa-sort-up').addClass('fa-sort-down');
          }
      
          $table.find('.sortable').not(this).data('sort-order', 'none').find('.sort-arrow').removeClass('fa-sort-up fa-sort-down').addClass('fa-sort');
      
          lastClickedHeader = this;
        });
      });  

  }