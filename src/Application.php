<?php

$array = [0=>[

				"mange"=>[
					"nom"=>"fifi",
					"prenom"=>"aboubakar",
					"age"=>22,
					"ecole"=>"univ lille",
				],
				"boire"=>[
					"nom"=>"diallo",
					"prenom"=>"madou",
					"age"=>23,
					"ecole"=>"univ paris",
				],
				"fumer"=>[
					"nom"=>"bah",
					"prenom"=>"siaka",
					"age"=>23,
					"ecole"=>"univ lyon",
				]

],
1=>[

				"mange"=>[
					"nom"=>"diakite",
					"prenom"=>"aboubakar",
					"age"=>22,
					"ecole"=>"univ lille",
				],
				"boire"=>[
					"nom"=>"diallo",
					"prenom"=>"madou",
					"age"=>23,
					"ecole"=>"univ paris",
				],
				"fumer"=>[
					"nom"=>"bah",
					"prenom"=>"siaka",
					"age"=>23,
					"ecole"=>"univ lyon",
				]

],
2=>[

				"mange"=>[
					"nom"=>"daga",
					"prenom"=>"aboubakar",
					"age"=>22,
					"ecole"=>"univ lille",
				],
				"boire"=>[
					"nom"=>"diallo",
					"prenom"=>"madou",
					"age"=>23,
					"ecole"=>"univ paris",
				],
				"fumer"=>[
					"nom"=>"bah",
					"prenom"=>"siaka",
					"age"=>23,
					"ecole"=>"univ lyon",
				]

],


];

print_r($array);
function compareParTitre($array){
	$temp;
	for($i=0;$i<count($array);$i++){
		for($j=0;$j<count($array);$j++){
			if((strcmp($array[$i]["mange"]["nom"],$array[$j]["mange"]["nom"]))<0){
				$temp=$array[$i];
				$array[$i]=$array[$j];
				$array[$j]=$temp;
			}
		}
	}
	print_r($array);
}

compareParTitre($array);







?>