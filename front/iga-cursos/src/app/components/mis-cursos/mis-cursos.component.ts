import { Component, OnInit } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';
import { ActivatedRoute, Router } from '@angular/router';
import { ApiService } from '../../services/api.service';
import { Compra } from '../../models/compra.model';

@Component({
  selector: 'app-mis-cursos',
  standalone: true,
  imports: [CommonModule, FormsModule],
  templateUrl: './mis-cursos.component.html'
  // Eliminamos la referencia al archivo SCSS
})
export class MisCursosComponent implements OnInit {
  email = '';
  compras: Compra[] = [];
  cargando = false;
  error = '';
  
  constructor(
    private route: ActivatedRoute,
    private apiService: ApiService,
    private router: Router
  ) { }

  ngOnInit(): void {
    this.route.queryParams.subscribe(params => {
      if (params['email']) {
        this.email = params['email'];
        this.consultarCursos();
      }
    });
  }

  consultarCursos(): void {
    if (!this.email) {
      this.error = 'Por favor ingrese su email';
      return;
    }
    
    this.cargando = true;
    this.compras = [];
    this.error = '';
    
    this.apiService.getComprasCliente(this.email).subscribe({
      next: (data) => {
        this.compras = data;
        this.cargando = false;
      },
      error: (err) => {
        this.cargando = false;
        if (err.status === 404) {
          this.error = 'No se encontraron compras para este email';
        } else {
          this.error = 'Error al consultar las compras';
          console.error(err);
        }
      }
    });
  }

  volverACursos() {
    this.router.navigate(['/cursos']);
  }
}