import {createBrowserRouter} from 'react-router-dom';
import MesaVirtual from './page/MesaVirtual';
import Login from './page/Login';
import Inbox from './page/Inbox';
import EditarPerfil from './page/EditarPerfil';
import TabsCuenta from './components/TabsCuenta';
import AjusteCuenta from './page/AjusteCuenta';
import ProtectedLayout from './components/ProtectedLayout';
import GuestLayout from './components/GuestLayout';
import PagePersonas from "./page/PagePersonas";
import PageEditarPersona from "./page/PageEditarPersona";
import PageProductos from "@/page/PageProductos";
import PageEditarProducto from "./page/PageEditarProducto";
import PageReniec from "@/page/PageReniec";
import PageDeuda from "@/page/PageDeuda";
import GoogleCallback from "@/components/GoogleCallback";
import PageProductoAsignacion from "@/page/PageProductoAsignacion";
import TabsPersona from "@/components/TabsPersona";
import SelectUbicacion from "@/components/SelectUbicacion";
import PageBienesRegistrarSalida from "@/page/PageBienesRegistrarSalida";
import PageRptSalidaBienes from "@/page/PageRptSalidaBienes";
import PageEstudiantes from "@/page/PageEstudiantes";
import PagePaletaSalida from "@/page/PagePaletaSalida";

const router = createBrowserRouter([
    {
      path: '/',
        element: <ProtectedLayout><Login/></ProtectedLayout>,
    },

    {
        path: '/',
        element: <GuestLayout/>,
        children: [
            {
                path: 'login',
                element: <Login/>,
            },
            {
                path: 'auth/google/callback',
                element: <GoogleCallback/>
            }
        ],
    },
    {
        element: <ProtectedLayout/>,
        children: [
            {
                path: '/doc/registro',
                element: <MesaVirtual/>,
            }
        ]
    },
    {
        path: '/',
        element: <ProtectedLayout/>,
        children: [
            {
                path: 'select',
                element: <SelectUbicacion/>
            },
            {
                path: 'admin',
                element: <Inbox/>,
            },
            {
                path: 'deudas',
                element: <PageDeuda/>,
            },
            {
                path: 'reniec',
                element: <PageReniec/>
            },
            {
                path: 'estudiantes',
                element: <PageEstudiantes/>,
            },
            {
                path: 'personas',
                element: <PagePersonas/>,
            },
            {
                path: 'productos',
                element: <PageProductos/>
            },
            {
                path: 'producto/editar/:id',
                element: <PageEditarProducto/>
            },
            {
                path: 'bienes/registro-salida',
                element: <PageBienesRegistrarSalida />,
            },
            {
                path: 'reporte/salida-bienes',
                element: <PageRptSalidaBienes />,
            },
            {
                path: 'page/papeleta-salida',
                element: <PagePaletaSalida />,
            },
            {
                path: '',
                element: <TabsCuenta/>,
                children: [
                    {
                        path: 'editar-perfil',
                        element: <EditarPerfil/>,
                    },
                    {
                        path: 'ajustes',
                        element: <AjusteCuenta/>,
                    },
                ],
            },
            {
                path: '',
                element: <TabsPersona/>,
                children: [
                    {
                        path: 'persona/editar/:id',
                        element: <PageEditarPersona/>
                    },
                    {
                        path: 'persona/editar/:id/asignar-bien',
                        element: <PageProductoAsignacion/>
                    },
                ]
            }
        ],
    },
]);

export default router;
