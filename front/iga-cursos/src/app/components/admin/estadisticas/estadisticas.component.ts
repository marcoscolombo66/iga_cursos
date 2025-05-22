import { Component, OnInit } from '@angular/core';
import { CommonModule } from '@angular/common';
import { ApiService } from '../../../services/api.service';
import { Router } from '@angular/router';

@Component({
  selector: 'app-estadisticas',
  standalone: true,
  imports: [CommonModule],
  templateUrl: './estadisticas.component.html'
  // Eliminamos la referencia al archivo SCSS
})
export class EstadisticasComponent implements OnInit {
  estadisticas: any[] = [];
  cargando = true;
  error = '';
  totalIngresos = 0;
  totalVentas = 0;

  constructor(
    private apiService: ApiService,
    private router: Router
  ) { }

  ngOnInit(): void {
    this.cargarEstadisticas();
  }

  cargarEstadisticas(): void {
    this.cargando = true;
    this.apiService.getEstadisticasCompras().subscribe({
      next: (data) => {
        this.estadisticas = data;
        this.calcularTotales();
        this.cargando = false;
      },
      error: (err) => {
        this.error = 'Error al cargar las estadísticas';
        this.cargando = false;
        console.error(err);
      }
    });
  }

  calcularTotales(): void {
    this.totalIngresos = this.estadisticas.reduce((total, item) => total + (+item.total_ingresos || 0), 0);
    this.totalVentas = this.estadisticas.reduce((total, item) => total + (+item.total_compras || 0), 0);
  }

  volverACursos() {
    this.router.navigate(['/cursos']);
  }
}