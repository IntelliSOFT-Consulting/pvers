// activate a tab on click
document.getElementById("defaultOpen").click();
document.getElementById("defaultOpenSex").click();
document.getElementById("defaultOpenAge").click();
document.getElementById("defaultOpenYear").click();

function geoTab(evt, geotabName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontentgeo");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinksgeo");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(geotabName).style.display = "block";
    evt.currentTarget.className += " active";
}

function sexTab(evt, sextabName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontentsex");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinkssex");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(sextabName).style.display = "block";
    evt.currentTarget.className += " active";
}

function ageTab(evt, agetabName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontentage");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinksage");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(agetabName).style.display = "block";
    evt.currentTarget.className += " active";
}

function yearTab(evt, yeartabName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontentyear");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinksyear");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(yeartabName).style.display = "block";
    evt.currentTarget.className += " active";
}
// Get the element with id="defaultOpen" and click on it
document.getElementById("geoOpen").click();
document.getElementById("sexOpen").click();
document.getElementById("ageOpen").click();
document.getElementById("yearOpen").click();


Highcharts.chart('sadrs-geo', {
    data: {
        table: 'datatablegeo'
    },
    chart: {
        type: 'bar'
    },
    title: {
        text: '',

    },
    yAxis: {
        allowDecimals: false,
        title: {
            text: 'Units'
        }
    },
    tooltip: {
        formatter: function() {
            return '<b>' + this.series.name + '</b><br/>' +
                this.point.y + ' ' + this.point.name.toLowerCase();
        }
    }
});
Highcharts.chart('sadrs-sex', {
    data: {
        table: 'datatablesex'
    },
    chart: {
        type: 'pie'
    },
    title: {
        text: '',

    },
    yAxis: {
        allowDecimals: false,
        title: {
            text: 'Units'
        }
    },
    tooltip: {
        formatter: function() {
            return '<b>' + this.series.name + '</b><br/>' +
                this.point.y + ' ' + this.point.name.toLowerCase();
        }
    }
});
Highcharts.chart('sadrs-age', {
    data: {
        table: 'datatableage'
    },
    chart: {
        type: 'bar'
    },
    title: {
        text: '',

    },
    yAxis: {
        allowDecimals: false,
        title: {
            text: 'Units'
        }
    },
    tooltip: {
        formatter: function() {
            return '<b>' + this.series.name + '</b><br/>' +
                this.point.y + ' ' + this.point.name.toLowerCase();
        }
    }
});
Highcharts.chart('sadrs-year', {
    data: {
        table: 'datatableyear'
    },
    chart: {
        type: 'bar'
    },
    title: {
        text: '',

    },
    yAxis: {
        allowDecimals: false,
        title: {
            text: 'Units'
        }
    },
    tooltip: {
        formatter: function() {
            return '<b>' + this.series.name + '</b><br/>' +
                this.point.y + ' ' + this.point.name.toLowerCase();
        }
    }
});