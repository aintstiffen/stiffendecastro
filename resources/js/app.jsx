import React from 'react';
import ReactDOM from 'react-dom/client';
import ProfileCard from './components/ProfileCard';
import Particles from './components/Particles';
import useIsDarkMode from './hooks/useIsDarkMode';

function ProfileApp({ profileId }) {
  return (
    <ProfileCard
      name="Stiffe De Castro"
      title="Backend Developer"
      handle="0xkhrystoffer.eth"
      status="Online"
      avatarUrl="/assets/image/avatar-preview.png"
      showUserInfo={true}
      enableTilt={true}
      enableMobileTilt={false}
      profileId={profileId}
    />
  );
}

function ParticlesApp() {
  const isDark = useIsDarkMode();

  if (!isDark) return null;

  return (
    <div style={{ position: 'fixed', top: 0, left: 0, width: '100vw', height: '100vh', zIndex: -1 }}>
  <Particles
 particleColors={['#ffffff', '#ffffff']}
    particleCount={200}
    particleSpread={10}
    speed={0.1}
    particleBaseSize={100}
    moveParticlesOnHover={true}
    alphaParticles={false}
    disableRotation={false}
  />
</div>
  );
}

// Mount Particles app into #particles-root div (fullscreen background)
const particlesRoot = document.getElementById('particles-root');
if (particlesRoot) {
  ReactDOM.createRoot(particlesRoot).render(<ParticlesApp />);
}

// Mount ProfileCard app into #react-profile-card div (profile card container)
const profileCardContainer = document.getElementById('react-profile-card');
if (profileCardContainer) {
  const profileId = profileCardContainer.dataset.profileId || null;
  ReactDOM.createRoot(profileCardContainer).render(<ProfileApp profileId={profileId} />);
}
