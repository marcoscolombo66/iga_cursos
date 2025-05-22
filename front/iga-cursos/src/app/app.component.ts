import { Component, OnInit } from '@angular/core';
import { RouterOutlet, RouterLink, RouterLinkActive, Router, NavigationEnd } from '@angular/router';
import { CommonModule } from '@angular/common';
import { AuthService } from './services/auth.service';
import { filter } from 'rxjs/operators';

@Component({
  selector: 'app-root',
  standalone: true,
  imports: [RouterOutlet, RouterLink, RouterLinkActive, CommonModule],
  templateUrl: './app.component.html'
  // Eliminamos la referencia al archivo SCSS si no existe
})
export class AppComponent implements OnInit {
  title = 'Cursos Gastronómicos IGA';
  currentYear = new Date().getFullYear();
  isAuthenticated = false;
  isAdminRoute = false;
  
  constructor(
    private authService: AuthService,
    private router: Router
  ) {}
  
  ngOnInit(): void {
    this.authService.isAuthenticated().subscribe(auth => {
      this.isAuthenticated = auth;
    });
    
    // Detectar rutas de administración
    this.router.events.pipe(
      filter(event => event instanceof NavigationEnd)
    ).subscribe(() => {
      this.isAdminRoute = this.router.url.includes('/admin');
    });
  }
  
  logout(): void {
    this.authService.logout();
    this.router.navigate(['/']);
  }
}