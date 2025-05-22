import { Component, OnInit } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';
import { ActivatedRoute, Router } from '@angular/router';
import { ApiService } from '../../services/api.service';
import { Curso } from '../../models/curso.model';
import Swal from 'sweetalert2';

@Component({
  selector: 'app-curso-detalle',
  standalone: true,
  imports: [CommonModule, FormsModule],
  templateUrl: './curso-detalle.component.html'
  // Eliminamos la referencia al archivo SCSS
})
export class CursoDetalleComponent implements OnInit {
  curso: Curso | null = null;
  cargando = true;
  error = '';
  
  // Datos del formulario
  nombre = '';
  email = '';
  celular = '';
  
  enviando = false;
  mensajeExito = '';

  constructor(
    private route: ActivatedRoute,
    private router: Router,
    private apiService: ApiService
  ) { }

  ngOnInit(): void {
    const idCurso = this.route.snapshot.paramMap.get('id');
    if (idCurso) {
      this.cargarCurso(+idCurso);
    } else {
      this.error = 'Curso no encontrado';
      this.cargando = false;
    }
  }

  cargarCurso(id: number): void {
    this.apiService.getCursoById(id).subscribe({
      next: (curso) => {
        this.curso = curso;
        this.cargando = false;
      },
      error: (err) => {
        this.error = 'Error al cargar el curso: ' + err.message;
        this.cargando = false;
        console.error(err);
      }
    });
  }

  comprarCurso(): void {
    if (!this.curso) return;
    
    if (!this.nombre || !this.email || !this.celular) {
      this.error = 'Por favor complete todos los campos';
      return;
    }
    
    this.enviando = true;
    this.error = '';
    this.mensajeExito = '';
    
    this.apiService.comprarCurso(this.nombre, this.email, this.celular, this.curso.idCurso).subscribe({
      next: (response) => {
        this.enviando = false;
        
        Swal.fire({
          title: '¡Compra Exitosa!',
          text: 'Los detalles del curso podras verlos en el listado de cursos comprados.',
          icon: 'success',
          confirmButtonText: 'Continuar',
          confirmButtonColor: '#28a745'
        }).then((result) => {
          this.router.navigate(['/mis-cursos'], { queryParams: { email: this.email } });
        });
      },
      error: (err) => {
        this.enviando = false;
        this.error = 'Error al procesar la compra. Por favor intente nuevamente.';
        console.error(err);
        
        Swal.fire({
          title: 'Error',
          text: 'No se pudo procesar la compra. Por favor intente nuevamente.',
          icon: 'error',
          confirmButtonText: 'Entendido'
        });
      }
    });
  }

  volverACursos() {
    this.router.navigate(['/cursos']);
  }
}