
    <h3>Oredoo - Personal Web Blogpage</h3>
    <div class="col-xl-4 col-lg-6 col-xxl-4 col-sm-6">
        <div class="card text-white bg-primary">
            <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex justify-content-between"><span class="mb-0">Name :</span><strong>{{ $info['name'] }}</strong></li>
                <li class="list-group-item d-flex justify-content-between"><span class="mb-0">E-mail :</span><strong>{{ $info['email'] }} </strong></li>
                <li class="list-group-item d-flex justify-content-between"><span class="mb-0">Time/Date :</span><strong>{{\Carbon\Carbon::now()->diffForHumans()}}</strong></li>
                <li class="list-group-item d-flex justify-content-between"><span class="mb-0">Admin Massage :</span><strong>{{  $mail['message'] }}</strong></li>
            </ul>

            Thanks,<br>
            Admin - <a href="https://github.com/Fahim-Hossain-Munna">click Here and get information about admin!</a>
        </div>
    </div>

