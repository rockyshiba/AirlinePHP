/**
 * Created by Lee on 4/4/2016.
 */
window.onload = function ()
{

    var required = ['first_name',
        'last_name',
        'vehicle_type',
        'description',
        'plate_province',
        'license_plate',
        'departure_date',
        'return_date' ];
    console.log(required[1]);
    //noinspection JSAnnotator
    document.getElementById("update").onclick = function ()
    {
        document.getElementById("missing_message").innerHTML = '';
        console.log("update button clicked");
        console.log(required[0]);
        for (i = 0; i < required.length; i++)
        {
            var missing = [];
            console.log(document.getElementById(required[i]).value);
            if (document.getElementById(required[i]).value == '')
            {
                missing.push(required[i]);
                console.log("Missing: " + missing);
                document.getElementById("missing_message").innerHTML = "All fields required";
                return false;
            }

        }

        if (missing.length == 0)
        {
			confirm("Do you want to make these changes?");
            //return true;
        }
        console.log(missing);
    }
}