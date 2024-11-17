<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Pagination-Ajax</title>
</head>
<body>
<div id="main">
    <div id="header">
      <h1>PHP & Ajax Pagination</h1>
    </div>

    <div id="table-data">
    </div>
  </div>
  <script type="text/javascript" src="jquery.js" ></script>
  <script type="text/javascript">
    $(document).ready(function(){
        function loadTable(page){
              $.ajax({
                url: "ajax-pagination.php",
                type: "POST",
                data: {page_no: page},
                success: function(data){
                  $("#table-data").html(data);
                }
              })
        }
        loadTable();


        // pagination 

        $(document).on("click","#pagination a",function(e) {
      e.preventDefault();
      var page_id = $(this).attr("id");

      loadTable(page_id);
    })
  });
  </script>
</body>
</html>