       function save file image




        public function store_file(Request $request)
        {
//           print_r($request->all());
                if ($request->hasFile('file')) {

                $filename = $request->file('file')->getClientOriginalName();
//                $type=$request->file('file')->getClientOriginalExtension();
                $filename =rand('100','999')."_".time()."_". $filename;
                trim($filename);

                $request->file('file')->storeAs('public/',$filename);
//                $type = $request->image->getClientOriginalExtension();
//                $request->image->storeAs('public/'.$date.'/', $filename);
                    if($request->flag=='roomcases')
                    {
                        $room = Roomcase::find($request->id_roomcase);
                        $room->file =$filename;
                        $room->save();
                    }
                    if($request->flag=='customers')
                    {
                        $room = Customer::find($request->id_customer);
                        $room->file =$filename;
                        $room->save();
                    }
                    if($request->flag=='doctors')
                    {
                        $room = doctor::find($request->id_doctor);
                        $room->file =$filename;
                        $room->save();
                    }
                    return response()->json([
                        'status'=>'ok'
                    ]);
            }



        }
