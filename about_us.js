var example = ['OUR TEAM', 'हमारी टीम', 'UNSER TEAM', 'LA NOSTRA SQUADRA'];

        textSequence(0);
        function textSequence(i) {

            if (example.length > i) {
                setTimeout(function() {
                    document.getElementById("loop").innerHTML = example[i];
                    textSequence(++i);
                }, 1000); // 1 second (in milliseconds)

            } else if (example.length == i) { // Loop
                textSequence(0);
            }

        }