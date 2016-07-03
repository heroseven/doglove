<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Narrow Jumbotron Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">


    <!-- Custom styles for this template -->
    <link href="../jumbotron-narrow.css" rel="stylesheet">
    
    
    <style type="text/css">
            
      body {
        font-family: Helvetica Neue, Arial, sans-serif;
        font-size: 14px;
        color: #444;
      }
      
      table {
        border: 2px solid #42b983;
        border-radius: 3px;
        background-color: #fff;
      }
      
      th {
        background-color: #42b983;
        color: rgba(255,255,255,0.66);
        cursor: pointer;
        -webkit-user-select: none;
        -moz-user-select: none;
        -user-select: none;
      }
      
      td {
        background-color: #f9f9f9;
      }
      
      th, td {
        min-width: 120px;
        padding: 10px 20px;
      }
      
      th.active {
        color: #fff;
      }
      
      th.active .arrow {
        opacity: 1;
      }
      
      .arrow {
        display: inline-block;
        vertical-align: middle;
        width: 0;
        height: 0;
        margin-left: 5px;
        opacity: 0.66;
      }
      
      .arrow.asc {
        border-left: 4px solid transparent;
        border-right: 4px solid transparent;
        border-bottom: 4px solid #fff;
      }
      
      .arrow.dsc {
        border-left: 4px solid transparent;
        border-right: 4px solid transparent;
        border-top: 4px solid #fff;
      }
      
      #search {
        margin-bottom: 10px;
      }
    </style>

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <!-- component template -->
    <script type="text/x-template" id="grid-template">
        <table>
          <thead>
            <tr>
              <th v-for="key in columns"
                @click="sortBy(key)"
                :class="{active: sortKey == key}">
                @{{key | capitalize}}
                <span class="arrow"
                  :class="sortOrders[key] > 0 ? 'asc' : 'dsc'">
                </span>
              </th>
            </tr>
          </thead>
          <tbody>
          
          
            <tr v-for="entry in data
              | filterBy filterKey
              | orderBy sortKey sortOrders[sortKey]">
              <td v-for="key in columns">
                @{{entry[key]}}
              </td>
            </tr>
          </tbody>
        </table>
      </script>

  </head>

  <body>

    <div class="container">

      <div class="row">
          <div id="demo">
              <form id="search">
              Search <input name="query" v-model="searchQuery">
              </form>
             
              <demo-grid
              :data="gridData"
              :columns="gridColumns"
              :filter-key="searchQuery">
              </demo-grid>
          </div>

       
      </div>
      
      
      <footer class="footer">
        <p>&copy; 2015 Arqui Software, Inc.</p>
      </footer>

    </div> <!-- /container -->


<script src="../bower_components/vue/dist/vue.js"></script>
<script src="../bower_components/vue-resource/dist/vue-resource.js"></script>
<script src="../js/vuejs/search.js"></script>
    


  </body>
</html>
