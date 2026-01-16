import { createContext, useState, useEffect, useCallback, type ReactNode } from 'react';
import { authApi } from '@/services/api/auth';
import type { AuthContextType, LoginCredentials, User } from '@/types/auth';

export const AuthContext = createContext<AuthContextType | null>(null);

interface AuthProviderProps {
    children: ReactNode;
}

export function AuthProvider({ children }: AuthProviderProps) {
    const [user, setUser] = useState<User | null>(null);
    const [token, setToken] = useState<string | null>(() =>
        localStorage.getItem('auth_token')
    );
    const [isLoading, setIsLoading] = useState(true);

    const isAuthenticated = !!token;

    useEffect(() => {
        const storedToken = localStorage.getItem('auth_token');
        if (storedToken) {
            setToken(storedToken);
        }
        setIsLoading(false);
    }, []);

    const login = useCallback(async (credentials: LoginCredentials) => {
        const response = await authApi.login(credentials);
        localStorage.setItem('auth_token', response.token);
        setToken(response.token);
    }, []);

    const logout = useCallback(() => {
        localStorage.removeItem('auth_token');
        setToken(null);
        setUser(null);
    }, []);

    const value: AuthContextType = {
        user,
        token,
        isAuthenticated,
        isLoading,
        login,
        logout,
    };

    return (
        <AuthContext.Provider value={value}>
            {children}
        </AuthContext.Provider>
    );
}
