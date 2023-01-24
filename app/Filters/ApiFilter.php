<?php

namespace App\Filters;

use Illuminate\Http\Request;

class ApiFilter {
    protected $safeParms = [];

    protected $columnMap = [];

    protected $operatorMap = [];

    public function transform (Request $request){
        
        //dd($request);

        $eloQuery = [];

        foreach($this->safeParms as $parm => $operators){
            //dd($parm,$operators);
            $query = $request->query($parm);
            //dd($request->query());
            if(!isset($query)){
                continue;
            }
            //dd($parm);
            $column = $this->columnMap[$parm] ?? $parm ;
            //dd($operators);
            foreach($operators as $operator){
                if(isset($query[$operator])){
                    $eloQuery[] = [$column, $this->operatorMap[$operator], $query[$operator]];
                }
            }
            

        }

        //dd($eloQuery);

        return $eloQuery;
    }
}