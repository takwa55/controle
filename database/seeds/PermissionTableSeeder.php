<?php
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
class PermissionTableSeeder extends Seeder
{
/**
* Run the database seeds.
*
* @return void
*/
public function run()
{
$permissions = [
'Mes Enquetes',
'Enquete Wilaya',
'Enquete Locale',
'Les Utilisateurs',


'Ajouter Assuré',
'ajouter droit',
'modifier droit',
'suprimer droit',
'Otorisations Utilisateur',
'Liste Utilisateur',
'Ajouter Utilisateur',
'Modifier Ut',
'Suprimer Ut',
'Modifier',
'les permissions',
'Ajouter Permission',
'Modifier Permission',
'Suprimer',
'Modifier Assuré',
'Suprimer Assuré',
'Modif_Ass',
'Supri_Ass',
'Voir',
'telecharger',
];
foreach ($permissions as $permission) {
Permission::create(['name' => $permission]);
}
}
}