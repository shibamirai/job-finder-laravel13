import Chart from "chart.js/auto";

const backgroundColor = [
        'rgba(255, 99, 132, 0.8)',
        'rgba(255, 159, 64, 0.8)',
        'rgba(255, 205, 86, 0.8)',
        'rgba(25, 205, 132, 0.8)',
        'rgba(75, 192, 192, 0.8)',
        'rgba(54, 162, 235, 0.8)',
        'rgba(25, 99, 205, 0.8)',
        'rgba(153, 102, 255, 0.8)',
        'rgba(201, 203, 207, 0.8)'
    ];

/*
 * 年齢：棒グラフ
 */
const age = {
    data: [0, 0, 0, 0, 0, 0, 0, 0, 0],
    labels: ['～24歳', '25～29歳', '30～34歳', '35～39歳', '40～44歳', '45～49歳', '50～54歳', '55～59歳', '60歳以上'],
}

for (let i = 0; i < ages.length; i++) {
    if (ages[i] < 25) {
        age.data[0]++;
    } else if (ages[i] < 30) {
        age.data[1]++;
    } else if (ages[i] < 35) {
        age.data[2]++;
    } else if (ages[i] < 40) {
        age.data[3]++;
    } else if (ages[i] < 45) {
        age.data[4]++;
    } else if (ages[i] < 50) {
        age.data[5]++;
    } else if (ages[i] < 55) {
        age.data[6]++;
    } else if (ages[i] < 60) {
        age.data[7]++;
    } else {
        age.data[8]++;
    }
}

new Chart(document.getElementById("ageChart"), {
    type: 'bar',
    data: {
        datasets: [{
            data: age.data,
            backgroundColor: backgroundColor,
        }],
        labels: age.labels,
    },
    options: {
        plugins: {
            legend: {
                display: false,
            }
        },
    }
});

/*
 * 雇用形態：横棒グラフ
 */
const employmentPattern = {
    data: employmentPatterns.map((ep) => ep.workers_count),
    labels: employmentPatterns.map((ep) => ep.name),
}

new Chart(document.getElementById("employmentPatternChart"), {
    type: 'bar',
    data: {
        datasets: [{
            data: employmentPattern.data,
            backgroundColor: backgroundColor,
        }],
        labels: employmentPattern.labels,
    },
    options: {
        indexAxis: 'y',
        plugins: {
            legend: {
                display: false,
            }
        },
    }
});

/*
 * 就職分野：円グラフ
 */
const genre = {
    data: [countIT, total - countIT],
    labels: ['IT系', 'それ以外'],
}

new Chart(document.getElementById("genreChart"), {
    type: 'pie',
    data: {
        datasets: [{
            data: genre.data,
        }],
        labels: genre.labels,
    },
});

/*
 * 習得スキル：横棒グラフ
 */
const skill = {
    data: skills.map((ep) => ep.masters_count),
    labels: skills.map((ep) => ep.name),
}

new Chart(document.getElementById("skillChart"), {
    type: 'bar',
    data: {
        datasets: [{
            data: skill.data,
            backgroundColor: backgroundColor,
        }],
        labels: skill.labels,
    },
    options: {
        indexAxis: 'y',
        plugins: {
            legend: {
                display: false,
            }
        },
    }
});

/*
 * 性別：円グラフ
 */
const gender = {
    data: genders.map((gender) => gender.workers_count),
    labels: genders.map((gender) => gender.name),
}

new Chart(document.getElementById("genderChart"), {
    type: 'pie',
    data: {
        datasets: [{
            data: gender.data,
        }],
        labels: gender.labels,
    },
});

/*
 * 障害：円グラフ
 */
const handicap = {
    data: handicaps.map((handicap) => handicap.affects_count),
    labels: handicaps.map((handicap) => handicap.name),
}

new Chart(document.getElementById("handicapChart"), {
    type: 'pie',
    data: {
        datasets: [{
            data: handicap.data,
        }],
        labels: handicap.labels,
    },
});
