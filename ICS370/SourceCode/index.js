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

function populateGoals() {
    $.get('/courses.php?major=1', function(courses) {
    });
}

function getGoalOne() {
    $.get('/secondaryrequirements.php?goal=1', function(reqs) {
        var courses = JSON.parse(reqs);
        $.each(courses, function(index, value) {
            var courseName = value[1];
            if (courseName == 'WRIT-121' || courseName == 'WRIT-131' || courseName == 'WRIT-132') {
                $('#goal-1-1-table').append('<tr class="table-data"><td>' + value[1] +'</td><td>' + value[2] + '</td><td>' + value[3] + '</td>');
            } else if (courseName == 'WRIT-231' || courseName == 'WRIT-232' || courseName == 'WRIT-261' || courseName == 'WRIT-271' || courseName == 'WRIT-331') {
                $('#goal-1-2-table').append('<tr class="table-data"><td>' + value[1] +'</td><td>' + value[2] + '</td><td>' + value[3] + '</td>');
            } else {
                $('#goal-1-3-table').append('<tr class="table-data"><td>' + value[1] +'</td><td>' + value[2] + '</td><td>' + value[3] + '</td>');
            }
        });
    });
}

function getGoalThree() {
    $.get('/secondaryrequirements.php?goal=3', function(reqs) {
        var courses = JSON.parse(reqs);
        $.each(courses, function(index, value) {
            if (!value[1].search(/\w{4}-\d{3}L/)) {
                $('#goal-3-lab-table').append('<tr class="table-data"><td>' + value[1] + '</td><td>' + value[2] + '</td><td>' + value[3] + '</td>');
            } else {
                $('#goal-3-table').append('<tr class="table-data"><td>' + value[1] + '</td><td>' + value[2] + '</td><td>' + value[3] + '</td>');
            }
        });
    });
}

function getGoalFour() {
    $.get('/secondaryrequirements.php?goal=4', function(reqs) {
        var courses = JSON.parse(reqs);
        $.each(courses, function(index, value) {
            $('#goal-4-table').append('<tr class="table-data"><td>' + value[1] + '</td><td>' + value[2] + '</td><td>' + value[3] + '</td>');
        });
    });
}

function getGoalFive() {
    $.get('/secondaryrequirements.php?goal=5', function(reqs) {
        var courses = JSON.parse(reqs);
        $.each(courses, function(index, value) {
            $('#goal-5-table').append('<tr class="table-data"><td>' + value[1] + '</td><td>' + value[2] + '</td><td>' + value[3] + '</td>');
        });
    });
}

function getGoalSix() {
    $.get('/secondaryrequirements.php?goal=6', function(reqs) {
        var courses = JSON.parse(reqs);
        $.each(courses, function(index, value) {
            $('#goal-6-table').append('<tr class="table-data"><td>' + value[1] + '</td><td>' + value[2] + '</td><td>' + value[3] + '</td>');
        });
    });
}

function getGoalSeven() {
    $.get('/secondaryrequirements.php?goal=7', function(reqs) {
        var courses = JSON.parse(reqs);
        $.each(courses, function(index, value) {
            $('#goal-7-table').append('<tr class="table-data"><td>' + value[1] + '</td><td>' + value[2] + '</td><td>' + value[3] + '</td>');
        });
    });
}

function getGoalEight() {
    $.get('/secondaryrequirements.php?goal=8', function(reqs) {
        var courses = JSON.parse(reqs);
        $.each(courses, function(index, value) {
            $('#goal-8-table').append('<tr class="table-data"><td>' + value[1] + '</td><td>' + value[2] + '</td><td>' + value[3] + '</td>');
        });
    });
}

function getGoalNine() {
    $.get('/secondaryrequirements.php?goal=9', function(reqs) {
        var courses = JSON.parse(reqs);
        $.each(courses, function(index, value) {
            $('#goal-9-table').append('<tr class="table-data"><td>' + value[1] + '</td><td>' + value[2] + '</td><td>' + value[3] + '</td>');
        });
    });
}

function getGoalTen() {
    $.get('/secondaryrequirements.php?goal=10', function(reqs) {
        var courses = JSON.parse(reqs);
        $.each(courses, function(index, value) {
            $('#goal-10-table').append('<tr class="table-data"><td>' + value[1] + '</td><td>' + value[2] + '</td><td>' + value[3] + '</td>');
        });
    });
}

function getElectives() {
    $.get('/secondaryrequirements.php?goal=electives', function(reqs) {
        var courses = JSON.parse(reqs);
        $.each(courses, function(index, value) {
            $('#electives-table').append('<tr class="table-data"><td>' + value[1] + '</td><td>' + value[2] + '</td><td>' + value[3] + '</td>');
        });
    });
}

function getRigr() {
    $.get('/secondaryrequirements.php?goal=rigr', function(reqs) {
        var courses = JSON.parse(reqs);
        $.each(courses, function(index, value) {
            $('#rigr-table').append('<tr class="table-data"><td>' + value[1] + '</td><td>' + value[2] + '</td><td>' + value[3] + '</td>');
        });
    });
}

function getLiberalStudies() {
    $.get('/secondaryrequirements.php?goal=liberal-studies', function(reqs) {
        var courses = JSON.parse(reqs);
        $.each(courses, function(index, value) {
            $('#liberal-studies-table').append('<tr class="table-data"><td>' + value[1] + '</td><td>' + value[2] + '</td><td>' + value[3] + '</td>');
        });
    });
}

function getMajorRequirements(majorId) {
    $.get('/majorrequirements.php?major=' + majorId, function(reqs) {
        $('#core-courses-table > tr').remove();
        var courses = JSON.parse(reqs);
        $.each(courses, function(index, value) {
            $('#core-courses-table').append('<tr class="table-data"><td>' + value[1] + '</td><td>' + value[2] + '</td><td>' + value[3] + '</td>');
        });
    });
}

function getGoalOneBreakdown() {
    $('#breakdown-goal-1-table > tr').remove();
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
    $('#breakdown-rigr-table > tr').remove();
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
    $('#breakdown-goal-3-table > tr').remove();
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
    $('#breakdown-goal-4-table > tr').remove();
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
    $('#breakdown-goal-5-table > tr').remove();
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
    $('#breakdown-goal-6-table > tr, #breakdown-goal-6-1-table > tr').remove();
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
    $('#breakdown-goal-7-table > tr').remove();
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
    $('#breakdown-goal-8-table > tr').remove();
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
    $('#breakdown-goal-9-table > tr').remove();
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
    $('#breakdown-goal-10-table > tr').remove();
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
            $('#recomended-courses-table').append('<tr class="table-data ' + value[1] + '"><td>' + value[1] +'</td><td>' + value[2] + '</td><td>' + value[3] + '</td></tr>');
            creditTotals += Number(value[3]);
        });
        $('#recomended-courses-credits').text(creditTotals);
    });
}

$(function () {
    openTab(null, 'core-courses');
    $('#planner-redirect').prop('disabled', true);
    $('#major-search').prop('disabled', true);
    $('#search-major').prop('disabled', true);
    $('#required-course-tab').prop('disabled', true);
    $('#breakdown-tab').prop('disabled', true);
    var majors;
    $.get('/majors.php?data=raw', function(data) {
        majors = data.split(',');
    });

    $.get('/majors.php?data=clean', function(data) {
        $('#course-dropdown').append(data);
        $('#major-search').prop('disabled', false);
        $('#search-major').prop('disabled', false);
    });

    $('#search-major').on('click', function(e) {
        if ($('#major-search').val() !== '') {
            var text = $('#major-search').val();
            var searchReg = new RegExp(text, 'ig');
            $.each(majors, function (index, value) {
                if (value.match(searchReg)) {
                    var cleanString = value.trim();
                    var stringExplode = cleanString.split(' ');
                    var id = stringExplode.join('-');
                    id = id.toLowerCase();
                    $('#course-dropdown option[id=' + id + ']').prop('selected', true);
                    $('#course-dropdown').change();
                }
            });
        }
    });

    $('#clear-search').on('click', function() {
       $('#major-search').val('');
    });

    populateGoals();
    getGoalOne();
    getGoalThree();
    getGoalFour();
    getGoalFive();
    getGoalSix();
    getGoalSeven();
    getGoalEight();
    getGoalNine();
    getGoalTen();
    getElectives();
    getRigr();
    getLiberalStudies();

    $('#course-dropdown').change(function(){
        $('#core-courses-table .table-data').remove();
        getMajorRequirements($('#course-dropdown').val());
        $('#planner-redirect').prop('disabled', false);
        $('#required-course-tab').prop('disabled', true);
        $('#breakdown-tab').prop('disabled', true);
    });

    $('#planner-redirect').click(function() {
        $('#required-course-tab').prop('disabled', false);
        $('#breakdown-tab').prop('disabled', false);
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
        populateCoreCourses($('#course-dropdown').val());

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
                $('#breakdown-core-courses-table').append('<tr class="table-data ' + value[1] +'"><td>' + value[1] +'</td><td>' + value[2] + '</td><td>' + value[3] + '</td></tr>');
                creditTotal += Number(value[3]);
            });
            $('#core-courses-credits').text(creditTotal);
        });

        populateCoreCourses(searchParams.get('major'));
    });

    $('#required-courses-download').click(function() {
        $.get('/CSVGenerator.php?major=' + $('#course-dropdown').val());
        setTimeout(function() {
            $('#csv-download').submit();
        }, 2000);
    });

    $('#upload-csv').click(function() {
        var fd = new FormData();
        var files = $('#file')[0].files[0];
        fd.append('file', files);

        $.ajax({
            url: 'CSVIngestion.php',
            type: 'post',
            data: fd,
            contentType: false,
            processData: false,
            success: function (response) {
                if (response != 0) {
                    var data = JSON.parse(response);
                    $.each(data, function(index, value) {
                       $('.' + value[0]).addClass('completed_course');
                    });
                } else {
                    alert('file upload failed');
                }
            }
        });
    });
});