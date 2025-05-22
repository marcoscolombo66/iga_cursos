import { Routes } from '@angular/router';
import { CursosListaComponent } from './components/cursos-lista/cursos-lista.component';
import { CursoDetalleComponent } from './components/curso-detalle/curso-detalle.component';
import { MisCursosComponent } from './components/mis-cursos/mis-cursos.component';
import { AuthGuard } from './guards/auth.guard';

export const routes: Routes = [
  { path: '', component: CursosListaComponent },
  { path: 'curso/:id', component: CursoDetalleComponent },
  { path: 'mis-cursos', component: MisCursosComponent },
  { path: 'login', loadComponent: () => import('./components/auth/login/login.component').then(c => c.LoginComponent) },
  { path: 'admin/estadisticas', loadComponent: () => import('./components/admin/estadisticas/estadisticas.component').then(c => c.EstadisticasComponent), canActivate: [AuthGuard] },
  { path: '**', redirectTo: '' }
]; 