import { Component } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';
import { Router } from '@angular/router';
import { AuthService } from '../../../services/auth.service';

@Component({
  selector: 'app-login',
  standalone: true,
  imports: [CommonModule, FormsModule],
  templateUrl: './login.component.html'
})
export class LoginComponent {
  username: string = '';
  password: string = '';
  error: string = '';
  
  constructor(
    private authService: AuthService,
    private router: Router
  ) {}
  
  onSubmit(): void {
    if (this.username.trim() && this.password.trim()) {
      const isAuthenticated = this.authService.login(this.username, this.password);
      if (isAuthenticated) {
        this.router.navigate(['/admin/estadisticas']);
      } else {
        this.error = 'Credenciales incorrectas. Por favor intente nuevamente.';
      }
    } else {
      this.error = 'Por favor ingrese usuario y contraseña.';
    }
  }
} 