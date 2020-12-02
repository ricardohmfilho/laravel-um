import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

//import { AboutComponent } from './components/about/about.component';
import { FormComponent } from './components/customers/form/form.component';
import { TableComponent } from './components/customers/table/table.component';
import { ErrorComponent } from './components/error/error.component';
import { PlansComponent } from './components/plans/plans.component';
import { RefreshComponent } from './components/refresh/refresh.component';

const routes: Routes = [
  { path: '', redirectTo: 'clientes', pathMatch: 'full' },
  { path: 'clientes', component: TableComponent },
  { path: 'clientes/editar/:id', component: FormComponent },
  { path: 'clientes/novo', component: FormComponent },
  { path: 'planos', component: PlansComponent },
  //{ path: 'sobre', component: AboutComponent },
  { path: 'refresh', component: RefreshComponent},
  { path: 'erro', component: ErrorComponent }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }