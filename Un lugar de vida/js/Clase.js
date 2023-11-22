class flor {
    /*el constructor es un método especial que se
    ejecuta en el momento de instanciar la clase*/
    constructor(nombre, genero, tipo) {
        this.nombre = nombre;
        this.genero = genero;
        this.tipo = tipo;
    }

    //Métodos
    fotosintesis() {
        console.log("Obtengo energia del sol");
    }
    presentacion() {
        console.log('Hola soy un ${this.nombre}');

    }

}
const flor1 = new flor("Rosas", "Rosas", "rosal"),
    flor2 = new flor("Pinchos", "Enredadera", "Invasora");
console.log(flor1);
console.log(flor2);