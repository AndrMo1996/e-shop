$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function checkDataListValue(value, list){
    for (let i = 0; i < list.options.length; i++) {
        if (value == list.options[i].value) {
            return list.options[i].id;
        }
    }
    return false;
}

$('.region').on('input',function(e){
    e.preventDefault();
    let list = document.getElementById('region-list');
    let value = $("input[name=region]").val();

    let result = checkDataListValue(value, list);

    if(result === false){
        $('.city').removeClass('active');
        $('.department').removeClass('active');
        this.setCustomValidity('Please select a valid value.');
    } else{
        this.setCustomValidity('');
        $.ajax({
            type:'GET',
            url:`http://localhost:8000/api/np/cities/${result}`,
            success:function(data){
                let cityList = document.getElementById('city-list');
                data.map((item) => {
                    let option = document.createElement('option');
                    option.value = item.Description;
                    option.id = item.Ref;
                    cityList.appendChild(option);
                })

                $('.city').addClass('active');
            }
        });
    }
});


$('.city').on('input',function(e){
    e.preventDefault();
    let list = document.getElementById('city-list');
    let value = $("input[name=city]").val();

    let result = checkDataListValue(value, list);

    if(result === false){
        $('.department').removeClass('active');
        this.setCustomValidity('Please select a valid value.');
    } else{
        this.setCustomValidity('');
        $.ajax({
            type:'GET',
            url:`http://localhost:8000/api/np/warehouses/${result}`,
            success:function(data){
                let depatrmentList = document.getElementById('department-list');
                data.map((item) => {
                    console.log(item);
                    let option = document.createElement('option');
                    option.value = item.Description;
                    option.id = item.Ref;
                    depatrmentList.appendChild(option);
                })

                $('.department').addClass('active');
            }
        });
    }
});
