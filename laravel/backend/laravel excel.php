cofig/app.php
     "maatwebsite/excel": "~2.1.0"

composer update

inport
 $results=Excel::load('storage/app/public/excel/'.$filename,function ($reader){

        })->get();

        