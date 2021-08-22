let cameras =  [{
    "number":"1627277293VCG202",
    "longitude":"57.95297251920029",
    "latitude":"102.7352961983922",
    "address":"Мира - 21"
},{
    "number":"1622007932ZMC390",
    "longitude":"57.95438923870031",
    "latitude":"102.7316762459972",
    "address":"Мира - 100"
}
]
let all_numbers = [];
for (let i =0;i<cameras.length;i++){
    all_numbers.push(cameras[i].number);
}
alert(all_numbers);