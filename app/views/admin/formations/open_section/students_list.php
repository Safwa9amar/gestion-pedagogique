<div role="tabpanel" id="section-list" class="tab-pane fade ">


<div class="row">
    <div class="input-group col-lg-4">
        <input type="text" placeholder="<?php echo $app_lang['search']; ?>" class="form-control"
            id="search" name="search">
        <!-- input range to limit search -->
    </div>
    <div class="spinner-border" id="spinner" role="status" style="display: none;"></div>
    <span id='search_result'>
    </span>
</div>
<br>
<table 
id="section-students-list"
class="
        table table-striped table-hover
        table-bordered
        display
        responsive
        nowrap
        section-list
    " id="section-list">
    <thead>
        <?php echo $table_head; ?>
    </thead>
    <tbody>
    </tbody>
</table>

<script>
    // get search input
    let search = document.getElementById('search');
    // get table body
    let tableBody = document.querySelector('tbody');
    // search_result
    let search_result = document.getElementById('search_result');
    // date result
    let search_data = [];

    // wait for user to end typing to send request
    let timer = null;
    search.addEventListener('keydown', function (e) {
        // check for all keys except letters and numbers and space  and stop the event
        if (e.keyCode < 48 && e.keyCode != 32 || e.keyCode > 90 && e.keyCode < 96 || e.keyCode > 105) return;
        search_result.innerHTML = ''
        // spinner
        document.getElementById('spinner').style.display = 'block';
        clearTimeout(timer);
        timer = setTimeout(function () {
            // send request
            fetch('../api/?route=students&search=' + search.value)
                .then(response => response.json())
                .then(data => {

                    data = Object.values(data).slice(0, 4);
                    search_result.innerHTML = generateTempView(data);

                    data.forEach(trainee => {
                        // check if trainee already exist
                        if (search_data.indexOf(trainee.id) == -1) {
                            search_data.push(trainee);
                        }

                    });
                }).finally(() => {
                    // hide spinner
                    document.getElementById('spinner').style.display = 'none';
                });


        }, 1000);
    });

    removeTrainee = (id) => {
        // get trainees row trainee_${id}
        let trainee = document.getElementById('trainee_' + id);
        // remove trainee from table
        trainee.remove();
    }

    // generate tr function
    generateTr = (trainee) => {
        return `
        <tr id='trainee_${trainee.id}'>
            <td>
                <button class="btn btn-primary" onclick="removeTrainee(${trainee.id})">
                    <i class="fas fa-trash"></i>
                </button>
            </td>
            <td>${trainee.id}</td>
            <td>${trainee.matricule}</td>
            <td>${trainee.first_name + ' ' + trainee.last_name}</td>
            <td>${trainee.birthday + ' ' + trainee.born_place}</td>
            <td>${trainee.father_name}</td>
            <td>${trainee.mother_name}</td>
            <td>${trainee.address}</td>
        </tr>
        `;
    }
    // generate temporary view for result data
    generateTempView = (trainee) => {
        if (trainee.length == 0) return '<?php echo $app_lang['trainee_not_found']; ?>'
        return trainee.map(trainee => {
            return `
            <br>
            <div>
                <button class="btn btn-primary" onclick="addTrainee(${trainee.id})">
                <i class="fas fa-plus"></i>
                </button> ${trainee.id} | ${trainee.matricule} | ${trainee.first_name} | ${trainee.last_name} | ${trainee.birthday} | ${trainee.born_place} | ${trainee.father_name} | ${trainee.mother_name} | ${trainee.address}
            </div>
            `
        })
    }
    addTrainee = (id) => {
        // check if trainee already exist in table
        if (document.getElementById('trainee_' + id)) return;
        // get trainee from search_data
        let trainee = search_data.find(trainee => trainee.id == id);

        // add trainee to table
        tableBody.innerHTML += generateTr(trainee);
        // remove trainee from search_data
        search_data.splice(search_data.indexOf(trainee), 1);
        // clear search input
        search.value = '';
        // clear search result
        search_result.innerHTML = '';
    }
</script>

</div>