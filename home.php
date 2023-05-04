<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <script defer src="./src/script/script.js"></script>
   <title>Home</title>
</head>
<body>

   <h1>WELCOME TO NASHVILLE</h1>

   <div class="btnDiv">
   <button id="getUsersBtn">USERS</button>
   <button id="getBooksBtn">BOOKS</button>
   </div>

   <div class="inputDiv">
      <form id="getOneUserForm">
      <input type="number" id="getOneUser" placeholder="User Id">
      <button id="getOneUserBtn">Submit</button>
      </form>

      <form id="getOneBookForm">
         <input type="number" id="getOneBook" placeholder="Book Id">
         <button id="getOneBookBtn">Submit</button>
      </form>

      <div id="oneDisplayDiv"></div>
   </div>


   <div id="displayDiv"></div>
</body>
</html>