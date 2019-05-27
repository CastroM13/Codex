cookieExpire = new Date();

function fractarlogin(no) {
    var nome = document.getElementById("username").value
    console.log("" + nome + "")
    var array = nome.split(" ")
    var primeironome = array[0]
    document.getElementById("username").value = primeironome
  }

fractarlogin()


