fetch('https://ein3.eindigo.net/v-popover/m/v1.30/?r=l&oby=timec&obyt=d&ps=16&api%5Bln%5D=hr&oiuz&ma[nice]')
    .then(response => response.json())
    .then(data => console.log(data));