import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { map, Observable } from 'rxjs';
import { Curso } from '../models/curso.model';
import { Compra } from '../models/compra.model';

@Injectable({
  providedIn: 'root'
})
export class ApiService {
  private apiUrl = 'http://localhost:8080/api'; // Ajusta según tu configuración

  constructor(private http: HttpClient) { }

  // Obtener todos los cursos
  getCursos(): Observable<Curso[]> {
    return this.http.get<Curso[]>(`${this.apiUrl}/cursos`);
  }
  
  // Agregar este método al api.service.ts
getCursoById(idCurso: number): Observable<Curso> {
  // Opción 1: Llamar a la API específica si existe un endpoint
  // return this.http.get<Curso>(`${this.apiUrl}/curso/${idCurso}`);
  
  // Opción 2: Obtener todos y filtrar en el cliente
  return this.getCursos().pipe(
    map(cursos => {
      const curso = cursos.find(c => Number(c.idCurso) === idCurso);
      if (!curso) {
        throw new Error(`Curso con ID ${idCurso} no encontrado`);
      }
      return curso;
    })
  );
}
  // Comprar un curso
  comprarCurso(nombre: string, email: string, celular: string, idCurso: number): Observable<any> {
    return this.http.post(`${this.apiUrl}/comprarCurso`, {
      nombre,
      email,
      celular,
      idCurso
    });
  }

  // Obtener compras de un cliente
  getComprasCliente(email: string): Observable<Compra[]> {
    return this.http.post<Compra[]>(`${this.apiUrl}/comprasCliente`, { email });
  }

  // Obtener estadísticas de compras (admin)
  getEstadisticasCompras(): Observable<any[]> {
    return this.http.post<any[]>(`${this.apiUrl}/estadisticasCompras`, {});
  }
} 