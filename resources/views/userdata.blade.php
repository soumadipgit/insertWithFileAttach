<h1>user data</h1>
{{-- <meta name="csrf-token" content="{{ csrf_token() }}" /> --}}
<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<form id="userForm">
    @csrf
    <input type="text" name="name" id="name" placeholder=" Enter your name">
    <br><br>
    <input type="email" name="email" id="email" placeholder="Enter your email">
    <br><br>
    <input type="number" name="phone" id="phone" placeholder=" Enter your phone number">
    <br><br>
    <input type="file" name="file" id="file">
    <br><br>
    <input type="submit" id="submit" value="submit">
</form>

<script>
    $(document).ready(function() {

        // $.ajaxSetup({
        //     headers: {
        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //     }
        // });

        $('#userForm').submit(function(e) {
            e.preventDefault();
            var fromData = new FormData(this);
            console.log(fromData);
            $.ajax({
                url: "{{route('userAdd') }}",
                type: "POST",
                data: fromData,
                processData: false,
                contentType: false,
                success: function(data) {
                    console.log(data);
                    // alert(data.res);
                },
                error: function(e) {
                    console.log(e.responseText);
                }
            });

        });
    })
</script>
