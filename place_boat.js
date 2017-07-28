let board = document.querySelector('#board');
boat_sizes = [6, 4, 4, 3, 3, 2, 2, 2];
boat_i = 0;
boats = [];
boat_tmp = null;
dir = "v";

for (let x = 0; x < 10; x++) {
    board.innerHTML += '<div>';
    for (let y = 0; y < 10; y++) {
        board.innerHTML += '<button id="_'+x+'_'+y+'" class="pos"></button>';
    }
    board.innerHTML += '</div>';
}

document.querySelector("#orientation").addEventListener("click", function () {
   if (dir === "v") {
       dir = "h";
       this.textContent = "Horizontal";
   } else {
       dir = "v";
       this.textContent = "Vertical";
   }
});

for (let but of document.querySelectorAll(".pos")) {
    but.addEventListener("click", function () {
        let x = parseInt(this.id.split("_")[1]);
        let y = parseInt(this.id.split("_")[2]);
        if ((dir === "v" && y + boat_sizes[boat_i] <= 10) || (dir === "h" && x + boat_sizes[boat_i] <= 10)) {
            boats.push(new Boat(x, y, boat_sizes[boat_i], dir));
            boat_i++;
            aff_board();
        }
        if (boat_sizes.length <= boat_i) {
            send(boats);
        }
    });
    but.addEventListener("mouseover", function () {
        let x = parseInt(this.id.split("_")[1]);
        let y = parseInt(this.id.split("_")[2]);
        if ((dir === "v" && y + boat_sizes[boat_i] <= 10) || (dir === "h" && x + boat_sizes[boat_i] <= 10)) {
            boat_tmp = new Boat(x, y, boat_sizes[boat_i], dir);
            aff_board();
        }
    });
    but.addEventListener("mouseout", function () {
        boat_tmp = null;
        aff_board();
    });
}

aff_board();

function aff_board() {
    for (let but of document.querySelectorAll('.pos')) {
        but.style.background = "white";
    }
    for (let boat of boats) {
        if (boat.dir === "v") {
            for (let i = 0; i < boat.size; i++) {
                x = boat.x;
                y = boat.y + i;
                document.querySelector('#_'+x+'_'+y).style.background = "red";
            }
        } else if (boat.dir === "h") {
            for (let i = 0; i < boat.size; i++) {
                document.querySelector('#_'+(boat.x + i)+'_'+boat.y).style.background = "red";
            }
        }
    }
    if (boat_tmp !== null && boat_tmp.dir === "v") {
        for (let i = 0; i < boat_tmp.size; i++) {
            x = boat_tmp.x;
            y = boat_tmp.y + i;
            document.querySelector('#_'+x+'_'+y).style.background = "green";
        }
    } else if (boat_tmp !== null && boat_tmp.dir === "h") {
        for (let i = 0; i < boat_tmp.size; i++) {
            document.querySelector('#_'+(boat_tmp.x + i)+'_'+boat_tmp.y).style.background = "green";
        }
    }
}

function send(toSend) {
    xhr = new XMLHttpRequest();
    xhr.open("POST", "save_bato.php", true);
    xhr.setRequestHeader("content-type", "application/json");
    xhr.send(JSON.stringify(toSend));
}