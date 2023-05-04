let getUsersBtn = document.querySelector("#getUsersBtn");
let getBooksBtn = document.querySelector("#getBooksBtn");
let getOneUserBtn = document.querySelector("#getOneUserBtn");
let getOneBookBtn = document.querySelector("#getOneBookBtn");
let displayDiv = document.querySelector("#displayDiv");
let getOneBook = document.querySelector("#getOneBook");
let getOneUser = document.querySelector("#getOneUser");
let oneDisplayDiv = document.querySelector("#oneDisplayDiv");



getUsersBtn.addEventListener("click", async()=>{
    let request = await fetch("/super-week/users");
    let users = await request.json();
    displayDiv.innerHTML="";

    for(let user of users){
        displayDiv.innerHTML += 
        `<p>User : ${user.first_name} ${user.last_name} </p>
        <p>Email : ${user.email}</p>`
    }
})

getBooksBtn.addEventListener("click", async()=>{
    let request = await fetch("/super-week/books");
    let books = await request.json();
    displayDiv.innerHTML="";

    for(let book of books){
        displayDiv.innerHTML += 
        `<p>Title : ${book.title} </p>
        <p>Content :${book.content} </p>
        `
    }
})

getOneBookBtn.addEventListener("click", async(ev)=>{
    ev.preventDefault();
    let idBook = getOneBook.value;
    let request = await fetch("/super-week/books/" + idBook);
    let book = await request.json();
    console.log(book)
    oneDisplayDiv.innerHTML="";

    oneDisplayDiv.innerHTML +=

    `<p>Title : ${book.title}</p>
    <p>Content : ${book.content}></p>
    `   
})

getOneUserBtn.addEventListener("click", async(ev)=>{
    ev.preventDefault();
    let idUser = getOneUser.value;
    let request = await fetch("/super-week/users/" + idUser);
    let user = await request.json();
    oneDisplayDiv.innerHTML="";

    oneDisplayDiv.innerHTML +=`
    <p> Name : ${user.first_name} ${user.last_name} </p>
    <p>Email : ${user.email}</p>`

})