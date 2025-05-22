import { Injectable } from '@angular/core';
import { BehaviorSubject, Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class AuthService {
  private isAuthenticatedSubject = new BehaviorSubject<boolean>(this.hasToken());
  
  constructor() {}
  
  login(username: string, password: string): boolean {
    // Verificar credenciales fijas (admin/admin)
    if (username === 'admin' && password === 'admin') {
      // Guardar token en localStorage (simplificado)
      localStorage.setItem('auth_token', 'admin_session');
      this.isAuthenticatedSubject.next(true);
      return true;
    }
    return false;
  }
  
  logout(): void {
    localStorage.removeItem('auth_token');
    this.isAuthenticatedSubject.next(false);
  }
  
  isAuthenticated(): Observable<boolean> {
    return this.isAuthenticatedSubject.asObservable();
  }
  
  private hasToken(): boolean {
    return !!localStorage.getItem('auth_token');
  }
} 