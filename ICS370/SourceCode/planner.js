function openTab(evt, tabName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    document.getElementById(tabName).style.display = "block";
    if (evt) {
        evt.currentTarget.className += " active";
    }
}

function getGoalOneBreakdown() {
    $.get('/planner.php?goal=1', function(data) {
        var courses = JSON.parse(data);
        var creditTotal = 0;
        $.each(courses, function(index, value) {
            $('#breakdown-goal-1-table').append('<tr class="table-data"><td>' + value[1] +'</td><td>' + value[2] + '</td><td>' + value[3] + '</td></tr>');
            creditTotal += Number(value[3]);
        });

        $('#goal-1-credits').text(creditTotal);
    });
}

function getGoalRigrBreakdown() {
    $.get('/planner.php?goal=rigr', function(data) {
        var courses = JSON.parse(data);
        var creditTotal = 0;
        $.each(courses, function(index, value) {
            $('#breakdown-rigr-table').append('<tr class="table-data"><td>' + value[1] +'</td><td>' + value[2] + '</td><td>' + value[3] + '</td></tr>');
            creditTotal += Number(value[3]);
        });

        $('#rigr-credits').text(creditTotal);
    });
}

function getGoalThreeBreakdown() {
    $.get('/planner.php?goal=3', function(data) {
        var courses = JSON.parse(data);
        var creditTotal = 0;
        $.each(courses, function(index, value) {
            $('#breakdown-goal-3-table').append('<tr class="table-data"><td>' + value[1] +'</td><td>' + value[2] + '</td><td>' + value[3] + '</td></tr>');
            creditTotal += Number(value[3]);
        });

        $('#goal-3-credits').text(creditTotal);
    });
}

function getGoalFourBreakdown() {
    $.get('/planner.php?goal=4', function(data) {
        var courses = JSON.parse(data);
        // var creditTotal = 0;
        $.each(courses, function(index, value) {
            $('#breakdown-goal-4-table').append('<tr class="table-data"><td>' + value[1] +'</td><td>' + value[2] + '</td><td>' + value[3] + '</td></tr>');
            // creditTotal += Number(value[3]);
        });
        // $('#goal-4-credits').text(creditTotal);
    });
}

function getGoalFiveBreakdown() {
    $.get('/planner.php?goal=5', function(data) {
        var courses = JSON.parse(data);
        var creditTotal = 0;
        $.each(courses, function(index, value) {
            $('#breakdown-goal-5-table').append('<tr class="table-data"><td>' + value[1] +'</td><td>' + value[2] + '</td><td>' + value[3] + '</td></tr>');
            creditTotal += Number(value[3]);
        });
        $('#goal-5-credits').text(creditTotal);
    });
}

function getGoalSixBreakdown() {
    $.get('/planner.php?goal=6', function(data) {
        var courses = JSON.parse(data);
        var creditTotal = 0;
        $.each(courses, function(index, value) {
            var courseName = value[1];
            var credit = value[3];
            if (courseName == 'PHIL-102') {
                $('#breakdown-goal-6-table').append('<tr class="table-data"><td>' + value[1] +'</td><td>' + value[2] + '</td><td>' + value[3] + '</td>');
                creditTotal += Number(value[3]);
            } else if (credit == 4) {
                $('#breakdown-goal-6-1-table').append('<tr class="table-data"><td>' + value[1] +'</td><td>' + value[2] + '</td><td>' + value[3] + '</td>');
                // creditTotal += Number(value[3]);
            }
        });
        $('#goal-6-credits').text(creditTotal);
    });
}

function getGoalSevenBreakdown() {
    $.get('/planner.php?goal=7', function(data) {
        var courses = JSON.parse(data);
        var creditTotal = 0;
        $.each(courses, function(index, value) {
            $('#breakdown-goal-7-table').append('<tr class="table-data"><td>' + value[1] +'</td><td>' + value[2] + '</td><td>' + value[3] + '</td></tr>');
            creditTotal += Number(value[3]);
        });
        $('#goal-7-credits').text(creditTotal);
    });
}

function getGoalEightBreakdown() {
    $.get('/planner.php?goal=8', function(data) {
        var courses = JSON.parse(data);
        var creditTotal = 0;
        $.each(courses, function(index, value) {
            $('#breakdown-goal-8-table').append('<tr class="table-data"><td>' + value[1] +'</td><td>' + value[2] + '</td><td>' + value[3] + '</td></tr>');
            creditTotal += Number(value[3]);
        });
        $('#goal-8-credits').text(creditTotal);
    });
}

function getGoalNineBreakdown() {
    $.get('/planner.php?goal=9', function(data) {
        var courses = JSON.parse(data);
        var creditTotal = 0;
        $.each(courses, function(index, value) {
            $('#breakdown-goal-9-table').append('<tr class="table-data"><td>' + value[1] +'</td><td>' + value[2] + '</td><td>' + value[3] + '</td></tr>');
            creditTotal += Number(value[3]);
        });
        $('#goal-9-credits').text(creditTotal);
    });
}

function getGoalTenBreakdown() {
    $.get('/planner.php?goal=10', function(data) {
        var courses = JSON.parse(data);
        var creditTotal = 0;
        $.each(courses, function(index, value) {
            $('#breakdown-goal-10-table').append('<tr class="table-data"><td>' + value[1] +'</td><td>' + value[2] + '</td><td>' + value[3] + '</td></tr>');
            creditTotal += Number(value[3]);
        });
        $('#goal-10-credits').text(creditTotal);
    });
}

function getLiberalStudiesBreakdown() {
    $.get('/planner.php?goal=liberal-studies', function(data) {
        var courses = JSON.parse(data);
        var creditTotal = 0;
        $.each(courses, function(index, value) {
            $('#breakdown-liberal-studies-table').append('<tr class="table-data"><td>' + value[1] +'</td><td>' + value[2] + '</td><td>' + value[3] + '</td></tr>');
            creditTotal += Number(value[3]);
        });
        $('#liberal-studies-credits').text(creditTotal);
    });
}

function getElectivesBreakdown() {
    $.get('/planner.php?goal=electives', function(data) {
        var courses = JSON.parse(data);
        $.each(courses, function(index, value) {
            $('#breakdown-electives-table').append('<tr class="table-data"><td>' + value[1] +'</td><td>' + value[2] + '</td><td>' + value[3] + '</td></tr>');
        });
    });
}

function populateCoreCourses(major) {
    $.get('/planner.php?goal=recommended&major=' + major, function(data) {
        var courses = JSON.parse(data);
        var creditTotals = 0;
        $.each(courses, function(index, value) {
            $('#recomended-courses-table').append('<tr class="table-data"><td>' + value[1] +'</td><td>' + value[2] + '</td><td>' + value[3] + '</td></tr>');
            creditTotals += Number(value[3]);
        });
        $('#recomended-courses-credits').text(creditTotals);
    });
}

$(function() {
    openTab(null, 'breakdown');
    getGoalOneBreakdown();
    getGoalRigrBreakdown();
    getGoalThreeBreakdown();
    getGoalFourBreakdown();
    getGoalFiveBreakdown();
    getGoalSixBreakdown();
    getGoalSevenBreakdown();
    getGoalEightBreakdown();
    getGoalNineBreakdown();
    getGoalTenBreakdown();
    getLiberalStudiesBreakdown();
    getElectivesBreakdown();

    var searchParams = new URLSearchParams(location.search);

    $.get('/planner.php?major=' + searchParams.get('major') + '&goal=major_name', function(data) {
       var majorName = JSON.parse(data);
        $.each(majorName, function(index, value) {
            $('.major-name').text(value[1]);
        });
    });

    $.get('/majorrequirements.php?major=' + searchParams.get('major'), function(data) {
        var courses = JSON.parse(data);
        var creditTotal = 0;
        $.each(courses, function(index, value) {
            $('#core-courses-table').append('<tr class="table-data"><td>' + value[1] +'</td><td>' + value[2] + '</td><td>' + value[3] + '</td></tr>');
            creditTotal += Number(value[3]);
        });
        $('#core-courses-credits').text(creditTotal);
    });

    populateCoreCourses(searchParams.get('major'));

    $('#required-courses-download').click(function() {
       $.get('/CSVGenerator.php?major=' + searchParams.get('major'));
       setTimeout(function() {
           $('#csv-download').submit();
       }, 2000);
    });
});