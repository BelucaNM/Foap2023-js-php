
function getProducts() {
    let products = [
        {
            name: "peres", 
            category: "fruites",
            price: 1.5
        },
        {
            name: "Xai", 
            category: "carns",
            price: 1.56
        },
        {
            name: "pomes", 
            category: "fruites",
            price: 1.5
        },
        {
            name: "Pollastre", 
            category: "carns",
            price: 1.68
        },
        {
            name: "Tonyina", 
            category: "peixos",
            price: 5.68
        },

        {
            name: "Conill", 
            category: "carns",
            price: 1.68
        },
        {
            name: "Llobarro", 
            category: "peixos",
            price: 5.68
        },
        {
            name: "kiwi", 
            category: "fruites",
            price: 1.25
        },
        {
            name: "Porc", 
            category: "carns",
            price: 3.68
        }
    ];
    return products;
}

function ordenaPerNom() {
    //products = getProducts();
    products.sort( (p1, p2) => {
      if (p1.name < p2.name) return -1;
      if (p1.name > p2.name) return 1;
      return 0;
    });
    escriureTaula(products);
}

function ordenaPerCategoria() {
   //products = getProducts();
    products.sort( (p1, p2) => {
      if (p1.category < p2.category) return -1;
      if (p1.category > p2.category) return 1;
      return 0;
    });
    escriureTaula(products);
}

function ordenaPerPreu() {
   // products = getProducts();
    products.sort( (p1, p2) => {
      if (p1.price < p2.price) return -1;
      if (p1.price > p2.price) return 1;
      return 0;
    });
    escriureTaula(products);
}

function filtraPer(elFiltre) {
    //products = getProducts();
    //console.log(products);
    if (elFiltre!="") {
        filtered = products.filter((producte) => producte.category==elFiltre);
    }
    else {
        //products = getProducts();
        filtered = products;
    }
    //console.log(filtered);
    escriureTaula(filtered);
}

function deleteItem(index) {
    //products = getProducts();
    console.log(index);
    products.splice(index, 1);
    console.log(products);
    
    escriureTaula(products);
}


function escriureTaula(products) {
    //console.log(products);
    let theTable = "";
    let product = null;
    let i = 0;
    products.forEach((product) => {
        theTable+="<tr><td>"+product.name+"</td><td>"+product.category+"</td><td>"+product.price+"</td><td><a href='javascript:deleteItem("+i+")' href='#'>x</a></td><td><a href='javascript:deleteItem("+i+")' href='#'>[editar]</a></td></tr>";
        i++;
    });

    document.getElementById("tauladeProductes").innerHTML=theTable;
}
/*
function escriureTaula(products) {
    console.log(products);
    let theTable = "";
    let product = null;
    for (let i in products) {
        product = products[i];
        theTable+="<tr><td>"+product.name+"</td><td>"+product.category+"</td><td>"+product.price+"</td></tr>";
    }
    document.getElementById("tauladeProductes").innerHTML=theTable;
}
*/

function obrirNovaFinestra() {
    window.open("https://www.google.com",
            "", "width=300, height=300");
}
