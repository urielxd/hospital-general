<?php

Breadcrumbs::register('home', function ($trail) {
    $trail->push('Inicio', route('home'));
});

Breadcrumbs::register('especialidades', function ($trail) {
    $trail->parent('home');
    $trail->push('Especialidades', route('especialidades.index'));
});

Breadcrumbs::register('especialidades-new', function ($trail) {
    $trail->parent('especialidades');
    $trail->push('Nueva cita', route('especialidades.create'));
});

Breadcrumbs::register('especialidades-edit', function($breadcrumbs, $e)
{
    $breadcrumbs->parent('especialidades');
    $breadcrumbs->push($e->name, route('especialidades.edit', $e->id));
});

Breadcrumbs::register('citas', function ($trail) {
    $trail->parent('home');
    $trail->push('Citas', route('citas.index'));
});

Breadcrumbs::register('citas-edit', function($breadcrumbs, $e)
{
    $breadcrumbs->parent('citas');
    $breadcrumbs->push('Editar cita', route('citas.edit', $e->id));
});

Breadcrumbs::register('administradores', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Administradores', route('administradores.index'));
});

Breadcrumbs::register('add-admin', function($breadcrumbs)
{
    $breadcrumbs->parent('administradores');
    $breadcrumbs->push('Nuevo administrador', route('administradores.create'));
});
Breadcrumbs::register('edit-admin', function($breadcrumbs, $e)
{
    $breadcrumbs->parent('administradores');
    $breadcrumbs->push('Editar administrador', route('administradores.edit', $e->id));
});
Breadcrumbs::register('doctores', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Doctores', route('doctores.index'));
});
Breadcrumbs::register('add-doctor', function($breadcrumbs)
{
    $breadcrumbs->parent('doctores');
    $breadcrumbs->push('Nuevo doctor', route('doctores.create'));
});
Breadcrumbs::register('edit-doctor', function($breadcrumbs, $e)
{
    $breadcrumbs->parent('doctores');
    $breadcrumbs->push('Editar doctor', route('doctores.edit', $e->id));
});

Breadcrumbs::register('pacientes', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Pacientes', route('pacientes.index'));
});

Breadcrumbs::register('add-paciente', function($breadcrumbs)
{
    $breadcrumbs->parent('pacientes');
    $breadcrumbs->push('Nuevo paciente', route('pacientes.create'));
});

Breadcrumbs::register('edit-paciente', function($breadcrumbs, $e)
{
    $breadcrumbs->parent('pacientes');
    $breadcrumbs->push('Editar Paciente', route('pacientes.edit', $e));
});

Breadcrumbs::register('add-profile', function($breadcrumbs, $e)
{
    $breadcrumbs->parent('add-paciente');
    $breadcrumbs->push('Nuevo perfil', route('pacientes.profile', $e));
});
Breadcrumbs::register('edit-profile', function($breadcrumbs, $e)
{
    $breadcrumbs->parent('pacientes');
    $breadcrumbs->push('Editar perfil', route('pacientes.profile.edit', $e));
});
Breadcrumbs::register('horarios', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Horarios', route('horarios.index'));
});

Breadcrumbs::register('paciente-cita', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Selecciona el paciente', route('cita_paciente'));
});
Breadcrumbs::register('especialidad-cita', function($breadcrumbs, $e)
{
    $breadcrumbs->parent('paciente-cita');
    $breadcrumbs->push('Selecciona la especialidad ', route('cita_especialidad', $e->id));
});
Breadcrumbs::register('paciente-nueva-cita', function($breadcrumbs, $e)
{
    $breadcrumbs->parent('especialidad-cita', $e);
    $breadcrumbs->push('Agendar cita', route('cita_especialidad_event', array($e->id, $e->id)));
});

// Pacientes
Breadcrumbs::register('especialidad-paciente', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Especialidades', route('especialidad'));
});

Breadcrumbs::register('add-cita', function($breadcrumbs, $e)
{
    $breadcrumbs->parent('especialidad-paciente');
    $breadcrumbs->push('Nueva cita', route('add_event', $e));
});
Breadcrumbs::register('diagnostico', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Diagnosticos', route('diagnostico.index'));
});
Breadcrumbs::register('create-diagnostico', function($breadcrumbs, $e)
{
    $breadcrumbs->parent('diagnostico');
    $breadcrumbs->push('Nuevo diagnostico', route('diagnostico.create', $e->id));
});
Breadcrumbs::register('edit-diagnostico', function($breadcrumbs, $e)
{
    $breadcrumbs->parent('diagnostico');
    $breadcrumbs->push('Editar diagnostico', route('diagnostico.create', $e->id));
});




?>
