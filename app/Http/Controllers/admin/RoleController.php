<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function index()
    {

        $roles = Role::all();
        return view('admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $permissions = Permission::all();
        return view('admin.roles.create', compact('permissions'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request -> validate([
            'name' => 'required',
            'permissions' => 'required',
        ]);

       $role = Role::create([   //crea un nuevo registro de rol, es decir que aqui llega lo del formulario del create, el 'name' es el nombre que se le dio al input, en pocas palabras es la informacion que se le manda por el formulario, con request le pedimos que recupere la informacion en name, osea en la columana name de la tabla
        'name' => $request -> name
       ]);
    //    el attach almacena los datos que se estan pasando del formulario a la tabla, lo que esta dentro de attach ese permissions, es el name que se le dio al input, por el cual se rescata los valores y se los manda a la tabla
       $role -> permissions() -> attach($request->permissions);

        // return $request->all();
        return redirect()->route('roles.index')->with('info', 'El rol se  creo correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        return view('admin.roles.show', compact('role'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $permissions = Permission::all();
        return view('admin.roles.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $request -> validate([
            'name' => 'required',
            'permissions' => 'required',
        ]);


        $role->update([
            'name' => $request->name
        ]);
// el metodo sync lo que hace es eliminar todos los permisos relacionados a un determinado rol y una vez que elimino los registros, lo genera nuevamente con los parametros que les estamos mandando dentro que es sync($request->permissions)
        $role -> permissions()->sync($request-> permissions);

        return redirect()->route('roles.edit', $role)->with('info', 'El rol se actualizo correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role -> delete();

        return redirect()->route('roles.index')->with('info', 'El rol se elimino con exito');
    }
}
