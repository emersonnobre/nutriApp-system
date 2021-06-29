<?php header("Content-type: text/css");?>
/* General */
@import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');
a {
  text-decoration: none;
  color: white;
  
}

a:visited {
  text-decoration: none;
  text-decoration-style: none;
}

.animated {
  -webkit-transition: 0.5s ease;
  transition: 0.5s ease;
}

.fechar {
  position: absolute;
  top: 0;
  right: 0;
  background-color: transparent;
  color: white;
  font-family: 'Roboto', sans-serif;
  border: none;
}

/* Alertas */
.toasts {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  margin: auto;
  max-width: 400px;
  padding: 6px;
  background: #cccccc;
  color: #333333;
  font-family: 'Roboto', sans-serif;
  text-align: center;
  border: 1px solid #aaaaaa;
  border-radius: 5px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
  visibility: hidden;
  opacity: 0;
  transition: opacity 0.2s, top 0.2s, visibility 0.2s;
}

.toast--visible {
  top: 20px;
  visibility: visible;
  opacity: 1;
}

.toast--success {
  background: #00C02B;
  border-color: #009D23;
  color: white;
}

.toast--error {
  background: #D50000;
  border-color: #BA0000;
  color: white;
}

/* Images */
.perfil {
  max-width: 9.3rem;
  max-height: 9.3rem;
  display: block;
  margin: 2rem 3rem 2rem 0;
}

/* Btn*/
.button-false {
  background: transparent;
  display: inline-block;
  color: white;
  border: none;
  outline: none;
  font-size: medium;
  top: 40%;
  position: relative;
}

.button-false:hover {
  cursor: pointer;
}

.button{
  float:right;
  margin-bottom:20px; 
  margin-right:5px;
  position: relative;
  padding:5px;
  color:black;
  font-family: 'Roboto', sans-serif;
  border:none;
  border-radius:5px;
  background-color:yellow;
  display: block;
}

.btn-insert{
  float:right;
  margin-right:5px;
  position: relative;
  padding:2px;
  color:black;
  font-family: 'Roboto', sans-serif;
  border:none;
  border-radius:5px;
  background-color:yellow;
  display: block;
}


.btn-insert:hover{
  cursor: pointer;
  opacity: 0.9;
}


.check {
  background: transparent;
  margin: 0 10px;
  outline: none;
  border: none;
}

.check:hover {
  transition: all 0.3s ease-in-out;
  background-color: yellow;
}

.button:hover{
  cursor: pointer;
  opacity: 0.9;
}

.btn:hover {
  opacity: 0.9;
}

.btn-inline:hover{
  opacity:0.9;
}

.btn {
  background-color: yellow;
  font-weight: bold;
  color: black;
  position: relative;
  font-family: "Roboto";
  border: none;
  padding: 0.5rem 1rem;
  margin: 1.2rem 0rem;
  border-radius: 5px;
  cursor: pointer;
  display: block;
}


.btn-inline {
  background-color: yellow;
  font-weight: bold;
  color: black;
  font-family: "Roboto";
  border: none;
  padding: 0.5rem 1rem;
  margin: 1.2rem 0rem;
  border-radius: 5px;
  cursor: pointer;
  display: block;
}

.btn-logout {
  color:white;
  background-color: tomato;
}


#btnBusca{
  font-size: 1.0rem;
  padding: 0.4rem 0.2rem;
  display: inline-block;
  max-width: 7rem;
  margin-left: 0rem;
  height: auto;
  font-weight: bold;
}

#btnBusca:hover{
  opacity: 0.9;
  cursor: pointer;
}

.btnAbsolute{
  position: fixed;
  float:left;
  bottom:10px;
  left:5px;
}

.btnAbsolute:hover {
  cursor: pointer;
  opacity: 0.9;
}

.btnDiv{
  float:right;
  margin-bottom: 10px;
  background-color: yellow;
  color:black;
}

/* Body */

body {
  font-family: 'Roboto', sans-serif;
}

.bodyA{
  background-image: url(../imagens/nutri.png);
  font-family: "Roboto", sans-serif;
  margin:auto;
  background-attachment: fixed;
  background-size: cover;
  background-repeat: no-repeat;
  background-color: #000;
  overflow-x: hidden;
}

/* Type of texts */

.text-xl {
  font-size: 3.2rem;
}

.text-md {
  font-size: 1.8rem;
  margin-bottom: 1.2rem;
}

.text-desc {
    
}

.text-little {
  font-size: 1.2rem;
  margin: 1.2rem 0;
}


.text-min {
  font-size: 0.95rem;
  margin: 1.2rem 0;
}

.text-center {
  text-align: center;
  justify-content: center;
  align-items: center;
  display: block;
  align-self: center;
}

.text-left {
  text-align: left;
}

.text-bold {
  font-weight: bold;
}

.box-md .spacement {
  display: block;
  margin-bottom: 1.2rem; 
}

.important-text {
  color: yellow;
}

.line-space-lt {
  line-height: 2rem;
}

/* Forms */
.form {
  margin-bottom: 4rem;
}

.text-area{
  padding: 7px;
  border-radius: 10px;
  border: none;
  font-family: 'Roboto';
  display: block;
  margin: 5px 0;
}

.busca{
  padding: 2px;
  border: solid 1px white;
  border-radius:10px;
  width:300px;
  height: 42px;
  margin-bottom: 20px;
}

.searchBox{
  display: block;
  margin-bottom: 3rem;
  height: 20px;
}

.searchBox input {
  width: 70%;
  background-color: transparent;
  color: white;
  padding: 0.7rem 0.2rem;
  outline: none;
  border: none;
  border-bottom: 0.5px yellow solid;
  line-height: 1.5rem;
  font-size: large;
}

.search-form {
  position: relative;
  width: 30rem;
  background: #57bd84;;
  border-radius: 3px;
}

.search-form input[type="search"] {
  outline: 0;
  width: 100%;
  background: #fff;
  padding: 0 1.6rem;
  border-radius: 3px;
  appearance: none;
  transition: all .3s cubic-bezier(0, 0, 0.43, 1.49);
  transition-property: width, border-radius;
  z-index: 1;
  position: relative;
}

.search-form button {
  display: none;
  position: absolute;
  top: 0;
  right: 0;
  width: 6rem;
  font-weight: bold;
  background: #57bd84;
  border-radius: 3px;
  width: calc(100% - 6rem);
}

.search-form label {
  position: absolute;
  clip: rect(1px, 1px, 1px, 1px);
  padding: 0;
  border: 0;
  height: 1px;
  width: 1px;
  overflow: hidden;
}

.form input {
  color: white;
}

.campo{
  display: block;
  margin-bottom: 0.5em;
}


.campo input{
  color:black;
  border: none;
  border-radius: 3.8px;
  outline: none;
  background: white;
  margin-bottom: 30px;
  padding: 0.4rem 0.2rem;
}
/* Boxs */

.modal {
  width: 100vw;
  height: 100vh;
  background-color: rgba(0, 0, 0, .5);
  position: fixed;
  z-index: 2000;
  top:0;
  left:0;
  display: none;
  justify-content: center;
  align-items: center;
}

.modal.mostrar {
  display: flex;
}


.modal-erro {
  background-color: ;
  font-family: 'Roboto', sans-serif;
  color: white;
  width: 20%;
  min-width: 50px;
  position: relative;
  padding: 20px;
  text-align:  center;
  border-radius: 7px;
  box-shadow: 1px 1px rgba(0, 0, 0, .3);
}

.mostrar .modal-erro {
  animation: modal-erro .3s;
}

.modal-aviso {
  background-color: #27c527cc;
  font-family: 'Roboto', sans-serif;
  color: white;
  width: 30%;
  min-width: 200px;
  position: relative;
  padding: 40px;
  text-align: center;
  border-radius: 10px;
}

.mostrar .modal-aviso {
  animation: modal .3s;
}

@keyframes modal {
  from {
    opacity: 0;
    transform: translate3d(0, -60px, 0);
  } 
  to{
    opacity: 1;
    transform: translate3d(0, 0, 0);
  }
}

@keyframes modal-erro {
  from {
    opacity: 0;
    transform: translate3d(0, -60px, 0);
  } to{
    opacity: 1;
    transform: translate3d(0, 0, 0);
  }
}

.box-border {
  border: solid 1px yellow;
  border-radius: 4px;
  margin-bottom: 5px;
  padding: 10px 5px;
}

.box-transition-color:hover {
  transition: all 0.13s ease-in;
  background-color: yellow;
  color: #27c527; !important
}

.red {
  border: solid 1.4px tomato;
}

.red:hover {
  transition: all 0.13s ease-in;
  background-color: tomato;
  color: white;
}

.box-inline {
  display: inline-block;
  padding: 12px;
}

.box-little {
  width: 40%;
  padding: 3.2rem;
  color: white;
  background-color: #27c527cc;
  text-align: left; 
  margin: 100px auto;
  border-radius: 5px;
  align-self: center;
  justify-content: center;
  display: block;
}


.box-md {
  width: 53rem;
  padding: 4rem;
  color: white;
  background-color: #27c527cc;
  text-align: left;
  margin: 100px auto;
  border-radius: 5px;
  align-self: center;
  justify-content: center;
  display: block;
}

.box-md h1 {
  margin-bottom: 6.2rem;
  text-align: center;
}

.inputBox {
  position: relative;
}

.inputBox input {
  width: 100%;
  padding: 10px 0;
  border: none;
  outline: none;
  border-bottom: 1px solid #ffffff;
  background: transparent;
  margin-bottom: 30px;
}

.box-xl .inputBox input {
  width: 70%;
}

.inputBox label {
  top: 0;
  left: 0;
  position: absolute;
  font-size: 16px;
  padding: 10px 0;
  transition: 0.5s;
  width: 100%;
  pointer-events: none;
}

.inputBox input:focus ~ label,
.inputBox input:valid ~ label {
  top: -18px;
  color: yellow;
  font-size: 12px;
}


.box-md p {
  margin: 8px 0;
}

.center {
  justify-content: center;
  align-items: center;
  text-align: center;
}

.box-md a {
  text-decoration: none;
  color: black;
  margin-top: 0px;
  margin-bottom: 0px;
}

input[type="submit"] {
  font-size: medium;
  background-color: yellow;
  color: black;
  font-family: "Roboto";
  border: none;
  padding: 0.7rem 1.4rem;
  border-radius: 5px;
  cursor: pointer;
}

input[type="submit"]:hover {
  opacity: 0.9;
}

.box-xl{
  margin:auto;
  padding:30px;
  margin-top:100px;
  margin-bottom: 100px;
  width:80%;
  height:80%;
  border-radius:3px;
  color:white;
  background-color:#27c527cc;
  text-align: center;
  -webkit-transition: 0.5s ease;
  transition: 0.5s ease;
}

.left {
  text-align: left;
}

.scroll {
  overflow-y: auto;
  overflow-y: scroll;
  max-height: 50vh;

}

.xl {
  max-height: 75vh;
}

.scroll::-webkit-scrollbar {
width:10px;
height: 10px;
margin-right: 5px;
}
 
.scroll::-webkit-scrollbar-track {
background:transparent;
}
 
.scroll::-webkit-scrollbar-thumb {
background: yellow;
border-radius: 4px;
}

::-webkit-scrollbar:hover {
  opacity: 0.9;
  cursor: pointer;
}

.box-col{
  display:inline-block;
  width:30%;
  margin-left:5px;
  margin-right: 20px;
  margin-bottom:40px;
  margin-top: 30px;
  vertical-align: top;
}

.left {
  justify-content: left;
  align-items: left;
}

.box-col button {
  top:0;
}

.box-col h1{
 
  color:yellow;
  margin-bottom: 10px;
}

.box-half {
  display: inline-block;
  width: 30%;
  vertical-align: middle;
  padding: 0px 12px;
}

.auto-height {
  height: auto;
} 

.containerCaixas{
  width: 80%;
  margin:auto;
  font-size:0;
  text-align: center;
  margin-top:100px;
}

.grid-item{
position: relative;
top: 0;
padding: 0.5rem;
width: 200px;
height: 200px;
display: inline-block;
margin:50px;
font-size: 1rem;
color:white;
font-style: italic;
font-family: sans-serif;
vertical-align: top;
line-height: auto;
border-radius:5px;
justify-content: center;
-webkit-transition: all 0.47s ease;
transition: all 0.47s ease;
}

.grid-item p{

margin-top: 40%;
}

.green{
  background-color:#27c527cc;
    
}

.grid-item:hover{
  background-color:grey;
  top: -4px;
  box-shadow: 3px 6px #696969;
}

.item-container {
  position: relative;
  top:0;
  width: 100%;
  display: flex;
  gap: 1rem;
  margin:20px;
  padding: 0.3rem 0.5rem;
  font-size: 1rem;
  color:white;
  font-style: italic;
  font-family: sans-serif;
  vertical-align: center;
  border-radius:5px;
  -webkit-transition: transform 0.3s ease-in-out;
  -webkit-transition: box-shadow 0.3s linear;
  transition: 3s linear;
  transition: box-shadow 0.3s linear;
}

.item-container:hover {
  transform: translateY(-3%);
  box-shadow: 0.1em 0.2em 0.2em black;
}

.block {
  border: 1px solid yellow;
  border-radius: 5px;
  padding: 10px;
  margin-bottom: 10px;
  transition: 0.5s ease;
}

/*HOME*/
 .home a:hover {
  color: yellow;
}

.home {
  text-align: center;
  margin-top: 150px;
  margin-bottom: 150px;
  color: white;
}
.home h1 {
  font-family: "Lobster", cursive;
}

.home a {
  text-decoration: none;
  color: white;
}
.home a:hover {
  color: yellow;
}
.home p {
  margin-top: 60px;
  text-decoration: none;
  color: white;
} 

/* Cabeçalhos */
.cabecalho {
  margin-top:2%;
  margin-bottom: 2%;
  color: white;
  font-weight: bold;
}

.cabecalho h1{
  text-align: center;
}

.cabecalho img{
  position:relative;
  top:2%;
  left:0.5%;
  /* max-width: 60px;
  max-height: 60px;*/
} 

.cabecalho p{
  position:relative;
  top:19%;
  left:1%;
  color:white;
  /* font-size:16px; */
  margin:0px;
  display:inline-block;
  -webkit-transition: all 0.3s linear;
  transition: transform 0.3s linear;
  transition: text-shadow 0.2s linear;
}

.cabecalho p:hover {
  transform: translateY(-6%);
  text-shadow: 0.1em 0.2em 0.3em black;
}

/*Perfil do usuario*/
.blocoGrande h2{
  font-weight: bold;
  color:yellow;
  display: inline;
}

.blocoGrande p{
  font-size: 24px;
  margin-bottom: 10px;
}

.blocoGrande input{
  width: 50%;
}

.containerPacientes p{
  display: inline-block;
}

/* Tables */

.table {
  
}

.table th {
  text-align: left;
  
  
}

table, th, td {
  padding: 0.8rem 0.7rem;
  margin-right: 1rem;
  border-collapse: separate;
  /* border: 1px black solid; */
}

