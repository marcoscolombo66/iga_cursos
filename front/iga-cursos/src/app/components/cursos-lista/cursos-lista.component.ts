import { Component, OnInit } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RouterModule } from '@angular/router';
import { ApiService } from '../../services/api.service';
import { Curso } from '../../models/curso.model';

@Component({
  selector: 'app-cursos-lista',
  standalone: true,
  imports: [CommonModule, RouterModule],
  templateUrl: './cursos-lista.component.html'
  // Eliminamos la línea: styleUrls: ['./cursos-lista.component.scss']
})
export class CursosListaComponent implements OnInit {
  cursos: Curso[] = [];
  cargando = true;
  error = '';

  constructor(private apiService: ApiService) { }

  ngOnInit(): void {
    this.cargarCursos();
  }

  cargarCursos(): void {
    this.cargando = true;
    this.apiService.getCursos().subscribe({
      next: (data) => {
        this.cursos = data;
        this.cargando = false;
      },
      error: (err) => {
        this.error = 'Error al cargar los cursos';
        this.cargando = false;
        console.error(err);
      }
    });
  }
}