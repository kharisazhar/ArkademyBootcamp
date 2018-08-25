<?php
$name = "Muhammad Kharis Azhar Nur Safrizal";
$address = "Dusun Gayam ,Kec.Karangkobar, Kab.Banjarnegara, Jawa Tengah 53453";
$hobbies = array("Playing Guitar", "Coding", "Swimming", "Business", "Basketball");
$is_married = false;
$skills = [
    'Language' => ['Java', 'Python', 'Kotlin'],
		'Mobile Development' => ['Android Studio'],
		'Web' => ['PHP','CSS', 'HTML', 'JavaScript'],
];

$school = [
    'highSchool' => 'SMK Telkom Purwokerto',
    'university' => '-'
];

function bio($name, $address, $hobbies, $is_married, $school, $skills){
    return json_encode(array(
        'name' => $name,
        'address' => $address,
        'hobbies' => $hobbies,
        'is_married' => $is_married,
        'school' => $school,
        'skills' => $skills
    ),JSON_PRETTY_PRINT);
}

echo bio($name, $address, $hobbies, $is_married, $school, $skills);
?>