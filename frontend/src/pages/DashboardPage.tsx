import { useAuth } from '@/hooks/useAuth';

export function DashboardPage() {
    const { logout } = useAuth();

    return (
        <div className="min-h-screen flex items-center justify-center bg-gray-50">
            <div className="text-center">
                <h1 className="text-3xl font-bold text-gray-900 mb-4">
                    Dashboard
                </h1>
                <p className="text-gray-600 mb-8">
                    You are logged in!
                </p>
                <button
                    onClick={logout}
                    className="
                        px-4 py-2 bg-red-600 text-white rounded-md
                        hover:bg-red-700 focus:outline-none focus:ring-2
                        focus:ring-offset-2 focus:ring-red-500
                    "
                >
                    Sign out
                </button>
            </div>
        </div>
    );
}
