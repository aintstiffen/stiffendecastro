import { useEffect, useState } from 'react';

export default function useIsDarkMode() {
  // Initialize based on whether <html> has class "dark"
  const [isDark, setIsDark] = useState(() => {
    if (typeof document !== 'undefined') {
      return document.documentElement.classList.contains('dark');
    }
    return false;
  });

  useEffect(() => {
    const observer = new MutationObserver(() => {
      const hasDark = document.documentElement.classList.contains('dark');
      setIsDark(hasDark);
    });
    observer.observe(document.documentElement, {
      attributes: true,
      attributeFilter: ['class'],
    });
    return () => observer.disconnect();
  }, []);

  return isDark;
}
