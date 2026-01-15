const apiDiv = document.querySelector("#apiDiv");

const contactApi = async() =>{
    try{
        const response = await fetch(`https://openlibrary.org/api/books`);

    if(!response || response.status !== 200){
        console.error(`Erreur lors de la récupération des données : `,response.statusText);
        return;
    }
    const dataTransformed = await response.json();
    const results=dataTransformed.results;

    // Object.entries(results).forEach(([key, value]) => {
    //     const classes = document.createElement("p");
    //     classes.textContent = value.name
    //     apiDiv.appendChild(classes);
    // });
   
    console.log(results);
    // console.log(dataTransformed);
    console.log(response);
    // console.log(response.ok);
    // console.log(response.status);

    }catch{
        console.error(`Erreur lors du fetch`, error);
    }
}
contactApi();